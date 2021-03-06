<?php
namespace MailRu\TargetApi;

/**
* Exception class for all HTTP errors throwed by client.
*/
class Error extends \Exception
{
    protected $fields = array();

    public function __construct($error, $code = 400, $previous = null, $fields = null)
    {
        parent::__construct($error, $code, $previous);
        if ($fields) {
            $this->fields = $fields;
        }
    }

    /**
     * Overrides parent's __toString to add fields' errors for Validation Error.
     *
     * @return array
     */
    public function __toString()
    {
        $res = sprintf(
            "Target API error: %s (#%d)\n",
            $this->getMessage(),
            $this->getCode()
        );
        if ($this->fields) {
            foreach ($this->fields as $field => $error) {
                $res .= sprintf("  #%s: %s\n", $field, $error);
            }
        }
        return $res . $this->getTraceAsString() .
            sprintf("\n  thrown in %s on line %d\n", $this->getFile(), $this->getLine());
    }

    /**
     * Returns fields' errors for API's Validation Error.
     *
     * @return array All validation errors occured during processing API request.
     */
    public function getFields()
    {
        return $this->fields;
    }

}

/**
* Target@Mail.Ru API's HTTP client.
*/
/**
  * @param boolean $hi when true 'Hello world' is echo-ed.
  *
  * @return void
  */
class Client
{
    protected static $HTTP_METHODS = array('GET', 'POST', 'DELETE');
    protected static $productionHost = 'target.mail.ru';
    protected static $sandboxHost = 'target-sandbox.my.com';
    protected $accessId;
    protected $privateKey;
    protected $url;

    public function __construct($access_id, $private_key, $is_sandbox = true, $version = 1)
    {
        $this->accessId = $access_id;
        $this->privateKey = $private_key;
        $host = $is_sandbox ? self::$sandboxHost : self::$productionHost;
        $this->url = sprintf('https://%s/api/v%d/', $host, $version);
    }

    public function request($resource, $method='GET', $post_data=null, $get_params=null)
    {
        $method = strtoupper($method);
        if (!in_array($method, self::$HTTP_METHODS)) {
            throw new Exception('Unsupported HTTP method: ' . $method);
        }

        // Prepare authentication signature.
        $data = $post_data ? json_encode($post_data) : '';
        $url = $this->url . ltrim($resource, '/');
        $string = sprintf('%s&%s&%s', $method, rawurlencode($url), rawurlencode($data));
        $signature = base64_encode(hex2bin(hash_hmac('sha1', $string, $this->privateKey)));

        $opts = array('http' =>
            array(
                'method'  => $method,
                'header' => array(
                    sprintf('Authorization: AuthHMAC %s:%s', $this->accessId, $signature),
                ),
                'ignore_errors' => true,
            )
        );

        // Perform HTTP request.
        if ($method == 'POST') {
            $opts['http']['header'][] = 'Content-type: application/json';
            $opts['http']['content'] = $data;
        }
        if ($get_params) {
            $url .= '?' . http_build_query($get_params);
        }

        $f = @fopen($url, 'r', false, stream_context_create($opts));
        if ($f === false) {
            throw new \Exception('Cannot open ' . $url);
        }
        $resp = json_decode(stream_get_contents($f), true);
        $meta = stream_get_meta_data($f);
        fclose($f);

        // Process the result.
        $code = null;
        if (isset($meta['wrapper_data']) && sizeof($meta['wrapper_data'])) {
            $tmp = explode(' ', $meta['wrapper_data'][0]);
            $code = sizeof($tmp) > 1 ? intval($tmp[1]) : null;
        }
        if ($code === 200) {
            return $resp;
        }
        if ($code === 400) {
            throw new Error('Validation failed', 400, null, $resp);
        }
        throw new Error($resp, $code);
    }
}

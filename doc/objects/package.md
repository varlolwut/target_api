
## Package

Пакет услуг

<table>
    <thead>
        <tr><th>Параметр</th><th>Тип</th><th>Значение</th></tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td><code>Integer</code></td>
            <td><p><br />Идентификатор пакета</p></td>
        </tr><tr>
            <td><code>name</code></td>
            <td><code>String</code></td>
            <td><p><em>255 символов</em> <br />Имя пакета</p></td>
        </tr><tr>
            <td><code>status</code></td>
            <td><code>String</code></td>
            <td><p><em>255 символов</em> </p></td>
        </tr><tr>
            <td><code>system_status</code></td>
            <td><code>String</code></td>
            <td><p><em>255 символов</em> </p></td>
        </tr><tr>
            <td><code>description</code></td>
            <td><code>String</code></td>
            <td><p><em>255 символов</em> <br />Описание пакета</p></td>
        </tr><tr>
            <td><code>price_per_show</code></td>
            <td><code>Decimal</code></td>
            <td><p><br />Минимальная цена за показ в валюте пользователя</p></td>
        </tr><tr>
            <td><code>price_per_click</code></td>
            <td><code>Decimal</code></td>
            <td><p><br />Минимальная цена за клик в валюте пользователя</p></td>
        </tr><tr>
            <td><code>max_price_per_unit</code></td>
            <td><code>Decimal</code></td>
            <td><p><br />Максимальная цена за клик или тысячу показов в зависимости от типа пакета (кликовый — <code>price_per_click</code> отличен от нуля, показовый — <code>price_per_show</code>) в валюте пользователя</p></td>
        </tr><tr>
            <td><code>features</code></td>
            <td><code></code></td>
            <td><p><br />Свойста пакета</p></td>
        </tr><tr>
            <td><code>banner_format</code></td>
            <td><code></code></td>
            <td><p><br />Формат баннера</p></td>
        </tr><tr>
            <td><code>targetings</code></td>
            <td>partial <a href="targetings.md"><code>Targetings</code></a><br />
(<code>pads</code>, <code>regions</code>)
</td>
            <td><p><br />Доступные таргетинги</p></td>
        </tr><tr>
            <td><code>flags</code></td>
            <td>List of <code>Strings</code></td>
            <td><p><em>255 символов</em> </p></td>
        </tr><tr>
            <td><code>max_uniq_shows_limit</code></td>
            <td><code>Integer</code></td>
            <td><p><br />Максимально допустимое количество показов уникам</p></td>
        </tr><tr>
            <td><code>options</code></td>
            <td><code>Options</code></td>
            <td></td>
        </tr>
    </tbody>
</table>
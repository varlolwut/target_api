## Пакеты услуг


### Список пакетов
`GET /api/v1/packages.json`

Метод возвращает список пакетов (объектов типа PackageForm), доступных
пользователю. Пакет — это набор характеристик услуг, предоставляемых
пользователю в рамках рекламных кампаний, созданных с указанием этого
пакета. Например, формат баннеров, набор площадок, на которых будут
показываться объявления, список доступных таргетингов. Подробный список
характеристик можно посмотреть в описании объекта PackageForm.

Идентификатор пакета необходим при создании рекламной кампании.

#### Пример

HTTP-запрос:

    GET /api/v1/packages.json HTTP/1.1
    Host: target-sandbox.my.com
    Content-Type: application/json
    Accept-Encoding: gzip, deflate, compress
    Authorization: Bearer Bh8kQmBUwgGDLuprqZhfMMm..7JrLbTAEFbEv74TydrC18

Curl-запрос:

    curl \
    -H 'Authorization: Bearer Bh8kQmBUwgGDLuprqZhfMMm..7JrLbTAEFbEv74TydrC18' \
    'https://target-sandbox.my.com/api/v1/packages.json'

Пример ответа:

    [
      {
        "banner_format": {
          "description": "Тизер (изображение 60х75 текст)",
          "fields": [
            "title",
            "text",
            "url",
            "image"
          ],
          "fields_": {
            "image": {
              "height": 75,
              "type": [
                "static",
                "rollovered"
              ],
              "width": 60
            },
            "text": {
              "max_length": 90,
              "required": true,
              "visible": true
            },
            "title": {
              "max_length": 25,
              "required": true,
              "visible": true
            },
            "url": {
              "required": true,
              "visible": true
            }
          },
          "id": 1,
          "image": {
            "height": 75,
            "type": [
              "static",
              "rollovered"
            ],
            "width": 60
          },
          "name": "teaser"
        },
        "description": "Мой Мир: внутренние ссылки, показы",
        "features": {
          "extended_age_targetings": true,
          "product_type": "game",
          "promo_id": [],
          "required_targetings": [
            "sex",
            "age",
            "day_hours",
            "week_days",
            "pads"
          ],
          "settings": {
            "mixing": {}
          },
          "targetings": [
            "-regions"
          ],
          "targetings_": [
            "age",
            "grouped_regions_names",
            "pads",
            "birthday",
            "sex",
            "regions_names",
            "fulltime"
          ],
          "url_type": "mir_redirect"
        },
        "id": 18,
        "is_external": false,
        "max_price_per_unit": "60",
        "name": "mir_int",
        "price_per_click": "0",
        "price_per_show": "0.0015",
        "slider_positions": {
          "blue_zone": 4.3,
          "max_price": 60.0,
          "min_price": 1.5,
          "overcompetitive_price": 4.3,
          "recommended_price": 2.9,
          "red_zone": 1.5
        },
        "status": "active",
        "system_status": "active",
        "targetings": {
          "pads": [
            {
              "description": "Другие проекты",
              "eye_url": {
                "description": "Посмотреть на Моем Мире",
                "id": 2,
                "url": "http://my.mail.ru/community/targetmailru"
              },
              "id": 3002,
              "name": "mail_other_abstract"
            },
            {
              "description": "Профили",
              "eye_url": {
                "description": "Посмотреть на Моем Мире",
                "id": 2,
                "url": "http://my.mail.ru/community/targetmailru"
              },
              "id": 3003,
              "name": "mail_mir_abstract"
            },
            {
              "description": "Приложения",
              "eye_url": {
                "description": "Посмотреть на Моем Мире",
                "id": 2,
                "url": "http://my.mail.ru/community/targetmailru"
              },
              "id": 4080,
              "name": "mail_mir_apps"
            }
          ]
        }
      }
    ]

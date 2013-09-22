## Ремаркетинговые аудитории
Позволяют показывать объявления тем пользователям, которые
уже посещали ваш сайт ранее.

### Получение списка аудиторий
`GET /api/v1/remarketings.json`

Метод возвращает список ремаркетинговых аудиторий в виде объектов
RemarketingForm.


### Создание аудитории
`POST /api/v1/remarketings.json`

Метод позволяет создать ремаркетинговую аудиторию. Принимает на вход
объект типа RemarketingForm, в котором должна быть указана хотя бы одна
«дизъюнкция» с таргетингом. В случае успеха возвращает так же объект
RemarketingForm.


### Изменение параметров аудитории
`POST /api/v1/remarketings/{remarketing_id}.json`

Метод изменяет параметры ремаркетинговой аудитории. Параметры передаются
в виде объекта RemarketingForm. В случае успеха метод возвращает так же
объект RemarketingForm с обновлёнными параметрами.


### Удаление аудитории
`DELETE /api/v1/remarketings/{remarketing_id}.json`

Метод осуществляет удаление ремаркетинговой аудитории. Это возможно только
в том случае, если аудитория не используется ни в одной кампании, за
исключением архивных. В случае успеха возвращает пустой ответ с кодом 200.

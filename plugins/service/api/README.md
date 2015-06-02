#Cloud web service "PhotoGrid" API


1. Token based авторизация
1. Запросы к API

## Token based authentication

Для того, чтобы работать с веб сервисом, необходимо пройти авторизацию:

* Получить username и password для доступа к веб-сервису (при тестировании это делается при помощи запроса 
`curl -X GET http://localhost:8000/stuff/create-user`)

* Используя полученные данные, написать HTTP запрос вида (на примере `curl`):

`curl -u apiuser23:86Qjhv8TQULidUMyBz3sN5NwowxJ -X GET http://localhost:8000/auth/api-token`

В ответ приходит JSON вида:
```
{"error":false,"code":"200","api_token":"81ea2eb99d950f7a8a6c0eb6a1b5a365a5a63048c7c2262404dadda422024632"}
```
* Далее `api_token` можно использовать при обращении к методам API, указывая при этом заголовок запроса:

```
curl -X GET -H "X-Auth-Token:1057727f3e08ed82d516d35def003a93f64a5a1367ab49975f847de98d5b88ff" "http://localhost:8000/api/v1/test"
```

```
curl -X GET -H "X-Auth-Token:1057727f3e08ed82d516d35def003a93f64a5a1367ab49975f847de98d5b88ff" "http://localhost:8000/api/v1/photosession-id?geo_area=23&photobox_id=01"
```

Срок действия api_token 60 минут. При истечении времени жизни, снова повторить процедуру получения токена.

Загрузка файлов на сервер:

Одиночный файл
```
curl -H "X-Auth-Token:1057727f3e08ed82d516d35def003a93f64a5a1367ab49975f847de98d5b88ff" -F photos=@mbuntu2.jpg -F press=OK "http://localhost:8000/api/v1/upload?photosession_id=2301-lvAv-6jn1"
````

Массив файлов
```
curl -H "X-Auth-Token:1057727f3e08ed82d516d35def003a93f64a5a1367ab49975f847de98d5b88ff" -F "photos[]=@mbuntu2.jpg" -F "photos[]=@mbuntu7.jpg" -F "photos[]=@mbuntu.png" -F press=OK "http://localhost:8000/api/v1/upload?photosession_id=2301-lvAv-6jn1"
```
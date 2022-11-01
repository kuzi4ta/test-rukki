# test-rukki

Разместил на хостинге для простоты тестирования kuzi4ta89.tmweb.ru

Сейчас всего 4е пользователя с разными ролями

api_key = 11111 - Администратор - полные права
api_key = 22222 и 44444 - Менеджеры - сейчас тоже полные права, но можно сделать ещё ограничение на запись и удаление в табличку users
api_key = 33333 - Обычный пользователь - может только выводить пользователей

Сделал апишку только для пользователей и накидал архитектуру для масштабируемости.
Для заказов и товаров всё в общем-то похоже будет.

Получение всех пользователей - GET https://kuzi4ta89.tmweb.ru/users/get?api_key=11111

Добавление нового пользователя - POST https://kuzi4ta89.tmweb.ru/users/add?api_key=11111 - 

пост данные 

name:kuzi4tazazaza
email:sdfgsdfg@sdfsf.com
phone:77777777
password:ksdjfgjfjfh
api_key:dfghdfghdfgh
role:2


Обновление существующего пользователя - POST https://kuzi4ta89.tmweb.ru/users/update?api_key=11111 - обновлять можно от одного до всех полей за раз

пост данные на изменение имени

name:kuzi4tazazaza


Удаление существующего пользователя по id - POST https://kuzi4ta89.tmweb.ru/users/delete?api_key=11111

пост данные

id:2

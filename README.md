larulogin
=========

Пакет для работы с сервисом [uLogin](https://ulogin.ru/)

Установка
---------

Выполняем `composer require bitw/larulogin:dev-master`

Подключаем /app/config/app.php `'providers' => array( ...` добавить `'Bitw\Larulogin\LaruloginServiceProvider',`

Импортируем конфигурацию `php artisan config:publish bitw/larulogin`

Создаем таблицу (выполняем миграцию) `php artisan migrate --package=bitw/larulogin`

Поключение uLogin
-----------------

В [личном кабинете](https://ulogin.ru/lk.php) необходимо добавить свой сайт и подтвердить проверку.

Настройка пакета
----------------



Использование
-------------

Генерация элемента `Form::uLogin()`
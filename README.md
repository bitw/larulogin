larulogin Laravel Package
=========================

Package for working with service [uLogin](https://ulogin.ru/)


Requirements
------------

- PHP >= 5.3

- Laravel >= 4.0


Installation
------------

Execute `composer require bitw/larulogin:dev-master` or include to `composer.json`
```
{
    "require": {
        "bitw/larulogin": "dev-master"
    }
}
```

Add provider in `/app/config/app.php`
```
    'providers' => array( ...` добавить `'Bitw\Larulogin\LaruloginServiceProvider',
```

Publish configuration file `php artisan config:publish bitw/larulogin`

Create table (apply migration) `php artisan migrate --package=bitw/larulogin`


Connect and configure uLogin
----------------------------

In [личном кабинете](https://ulogin.ru/lk.php) you need to add your site and confirm the test.


Use
---

Call
```Form::uLogin()```


Config package
----------------

...


Licence
-------

[larulogin](https://github.com/bitw/larulogin) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
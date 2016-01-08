Yii 2 Test over Basic Project
============================

Тестовое задание для ПХП разработчика.

Написать код, который будет симулировать запрос API фейсбука для получения постов пользователя.

Когда кто-то обращается к нам, надо сходить на фейсбук с теми-же параметрами, 
получить данные в JSON виде, сохранить данные в локальную базу данных и в 
следующий раз отдавать их из базы, если они там есть.

Кроме того, надо иметь возможность делать CRUD для данных в локальной DB.


Обязательные тулзы для исполнения задания:

    Yii 1.x
    Active record
    composer
    Yii механизм миграций DB

DEVELOPER COMMENTS
------------

К сожалению, я открыл для себя Yii совсем недавно и сразу начал осваивать Yii2.
Чтобы не тратить время на переучивание под Yii1, использовал известный мне движок.

REQUIREMENTS
------------

The minimum requirement by this project that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Fork this GIT repository locally

I.e. just clone:

```
cd /var/www
git clone https://github.com/IuriiP/test160106.git gittest
```

### Install dependencies via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install dependencies using the following command:

~~~
composer update
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=<yourDBhost>;dbname=<yourDBname>',
    'username' => '<yourDBuserName>',
    'password' => '<yourDBpassword>',
    'charset' => 'utf8',
];
```

**NOTE:** You can leave the default remote database settings.

### Application keys for Facebook

You can get your application key [here](https://developers.facebook.com/apps)
or use my test key. 

```js
    'components' => [
        /...
        'authClientCollection' => [
            /...
            'clients' => [
                'facebook' => [
                    /...
                    'clientId' => '<yourAppId>',
                    'clientSecret' => '<yourAppSecret>',
                    /...
                ],
            ],
        ],
        /...
    ],
```

**NOTE:** You can leave the default Facebook Application key settings.

### Set up the database migration

~~~
php yii migrate/up
~~~

### Apache virtual host setup

Create the virtual host to `<yourPathToProject>/web` directory.
`mod_rewrite` must be enabled! [See about...](http://httpd.apache.org/docs/current/mod/mod_rewrite.html)

Restart Apache.

**NOTE:** On some hosting provider you'll be directed to root directory only. It's not trouble!
The site will work in this case, but you'll have some security vulnerability.

### Go to site

You must login over Facebook account for access to CRUD.

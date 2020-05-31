# Todoandco

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/addb47cedadc4a5f9fe6f2eb8b18379e)](https://www.codacy.com/manual/siggwer/Todoandco?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=siggwer/Todoandco&amp;utm_campaign=Badge_Grade)

Openclassrooms Project 8 Todo list

![symfony](https://symfony.com/logos/symfony_white_02.svg)

* Developped with the Symfony 4.4 framework
* CSS : Bootstrap 4

## Prérequisites
* **Php 7.4**
* **Mysql 5.7**
* **Redis Server**

## Tested with:
- PHPUnit [more infos](https://phpunit.de/)

## Metrics with:
- PHP Metrics
- BlackFire

## Cache with:
- Redis

## Install application:
clone or download the repository into your environment. https://github.com/siggwer/Todoandco.git

```
$ composer install
```

enter your doctrine.yaml parameter
```
dbal:
driver: 'your_driver'
server_version: 'your_version'
charset: your_charset
default_table_options:
    charset: your_default_charset
    collate: your_default_collate
    url: 'your_default_url_env'
```

enter your parameters database
```
database_host: yoyr_host
database_port: your_database_port
database_name: your_database_name (by default : todolist)
database_user: your_user_pseudo
database_password: your_user_password
```
```
$ php bin/console composer prepare
```

Run REDIS server [more informations](https://redis.io/)
```
$ redis-server
```
Run application in your favorite browser

- Create user
- LogIn
- Create task

# *Enjoy !!*

[Security documentation](https://github.com/yohannzaoui/projet8_ToDo_and_Co/blob/master/docs/documents/symfony_security.pdf)

[Quality Code documentation](https://github.com/yohannzaoui/projet8_ToDo_and_Co/blob/master/docs/documents/audit_qualit%C3%A9.pdf)

[Contribute to this project](https://github.com/yohannzaoui/projet8_ToDo_and_Co/blob/master/Contributing.md)


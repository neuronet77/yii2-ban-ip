Yii2 Ban IP
===========
Extension to black IP addresses to access the system after x number of 404 errors within x minutes

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist gertex/yii2-ban-ip "*"
```

or add

```
"gertex/yii2-ban-ip": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \gertex\yii2banip\AutoloadExample::widget(); ?>```
# FirePHP Error handler
Register this error handler to see PHP errors in your browsers console using FirePHP.

## Installation
Install the using `composer`:
```shell
composer require okneloper/debug
```

Also install FirePHP extension e.g.:
[FirePHP Chrome Extension](https://chrome.google.com/webstore/detail/firephp4chrome/gpgbmonepdpnacijbbdijfbecmgoojma)

## Usage
Register the FirePHP Handler:
```php
\Okneloper\Debug\Debug::registerFirePhpHandler();
echo ${'undefined variable'};
```

See PHP notice in the broswer console.

## Configuration

### Set the root path
Set the root path of your application to exclude it from the error file path:

```php
$debug = \Okneloper\Debug\Debug::registerFirePhpHandler();
$debug->setRootPath('/home/user/public_html');
```

Before: 
```
Notice: Undefined variable: undefined variable 
in /home/user/public_html/public/index.php on line 25
```

After 

```
Notice: Undefined variable: undefined variable 
in public/index.php on line 25
```
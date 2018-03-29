# Slim3 Session Middleware

Simple middleware for Slim 3, which allows managing PHP built-in sessions and 
includes a Helper class to help you with the $_SESSION superglobal.

## License

Licensed under MIT. Totally free for private or commercial projects.

## Requirements


## Installation

```bash
composer require andrewdyer/slim3-session-middleware
```

## Usage

```php
$app = new \Slim\App;
$app->add(new \Slim\Middleware\SessionMiddleware());
$app->run();
```

### Supported Options

* `autorefresh`: boolean: If you want session to be refresh when user activity is made (interaction with server). Set to `false` by default.
* `domain`: string: Cookie domain, for example 'www.php.net'. To make cookies visible on  all subdomains then the domain must be prefixed with a dot like '.php.net'. Set to `null` as default.
* `handler`: mixed: Custom session handler class or object. Must implement `SessionHandlerInterface` as required by PHP. Set to `null` as default.
* `httponly`: boolean: If set to true then PHP will attempt to send the httponly flag when setting the session cookie. Set to `false` by default.
* `ini_settings`: array: Associative array of custom session configuration. THis is set to null by default.
* `lifetime`: int or string: The lifetime of the session cookie, defined in seconds. Default is `20 minutes`, but can be set to any value which `strtotime` can parse.
* `name`: string: Name for the session cookie. Defaults to `session` instead of PHP's `PHPSESSID`.
* `path`: string: The path on the domain where the cookie will work. Use a single slash ('/') for all paths on the domain. Set to `"/"` by default.
* `secure`: boolean: Cookies will only be sent over secure connections if true.  Set to `false` by default.

### Session Helper

A Helper class is available, which you can attached to your app container:

```php
$container = $app->getContainer();

$container["session"] = function ($c) {
  return new \Slim\Session\Helper;
};
```
# Slim3 Session Middleware

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/66698967b6ec44949eb30795f09a435e)](https://www.codacy.com/app/andrewdyer/slim3-session-middleware?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=andrewdyer/slim3-session-middleware&amp;utm_campaign=Badge_Grade)

Simple middleware for the Slim Framework, which starts and allows managing of PHP built-in sessions. Also included is a useful Helper class.

## License

Licensed under MIT. Totally free for private or commercial projects.

## Installation

```bash
composer require andrewdyer/slim3-session-middleware
```

## Usage

```php
$app = new \Slim\App;
$app->add(new \Slim\Middleware\SessionMiddleware([
    "autorefresh"   => true,
    "name"          => "myapp_session",
    "lifetime"      => "1 hour" 
]));
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

The `\Slim\Session\Helper` class can be attached to your app container:

```php
$container = $app->getContainer();

$container["session"] = function ($c) {
  return new \Slim\Session\Helper;
};
```

The helper class can be used to check if a session variable exists in addition to setting, getting and deleting session variables.

```php
$session = new \Slim\Session\Helper;

// Check if variable exists
$exists = $session->exists("my_key");
$exists = isset($session->my_key);
$exists = isset($session["my_key"]);

// Get variable value
$value = $session->get("my_key", "default");
$value = $session->my_key;
$value = $session["my_key"];

// Set variable value
$session->set("my_key", "my_value");
$session->my_key = "my_value";
$session["my_key"] = "my_value";

// Delete variable
$session->delete("my_key");
unset($session->my_key);
unset($session["my_key"]);
```
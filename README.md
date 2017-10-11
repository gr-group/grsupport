# grinc/grsupport

Support package used in projects in Laravel of technology companies of GR Group

# Installation

Execute the following composer command.

```
composer require gr-group/grsupport
```


Register the service provider in config/app.php file.  
If you are in L5.5+ you don't need the 

```php
'providers' => [
	...
	GRGroup\GRSupport\GRSupportServiceProvider::class,
]
```
   	
## How to use middleware for clean html strings from global request

This middleware uses the [Purifier](https://github.com/mewebstudio/Purifier) package.

Now, in app/Http/Kernel.php file

```php
protected $middleware = [
	...
	\GRGroup\GRSupport\Middleware\CleanHtmlStrings::class,
];
```

## Methods, Helpers and Blade Directives

[Methods](https://github.com/gr-group/grsupport/blob/master/src/Classes/Support.php#L9)

[Helpers](https://github.com/gr-group/grsupport/blob/master/src/Helpers/grsupport.php#L3)

[Blade Directives](https://github.com/gr-group/grsupport/blob/master/src/GRSupportServiceProvider.php#L18)
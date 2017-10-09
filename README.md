# grinc/grsupport

Support package used in projects in Laravel of technology companies of GR Group

# Installation

Execute the following composer command.

    composer require gr-group/grsupport

Register the service provider in app.php.  
If you are in L5.5+ you don't need the 

	'providers' => [
		...
		GRGroup\GRSupport\GRSupportServiceProvider::class,
   	]
   	
## The middleware of html tags cleaning in the strings of a global request

In app/Http/Kernel.php

	protected $middleware = [
   		...
   		\GRGroup\GRSupport\Middleware\CleanHtmlStrings::class,
	];

## Methods, Helpers and Blade Directives

[Methods](https://github.com/gr-group/grsupport/blob/master/src/Classes/Support.php#L9)

[Helpers](https://github.com/gr-group/grsupport/blob/master/src/Helpers/grsupport.php#L3)

[Blade Directives](https://github.com/gr-group/grsupport/blob/master/src/GRSupportServiceProvider.php#L18)
 # FluidPhp Translator Helper

FluidPhp is a framework based on the PhpToolCase library, visit [phptoolcase.com](http://phptoolcase.com) for complete guides and examples.

This helper to can parse xml tags that can be used in your views.

## Installation

Add the package to your composer.json file, to install the helper.

With fluidphp framework:
```
"require": 
{
	"mnsami/composer-custom-directory-installer": "2.0.*" ,
	"fluidphp/translator-helper": "*"
} ,
"extra": 
{
	"installer-paths": 
	{
		"./vendor/fluidphp/helpers/Translator": ["fluidphp/translator-helper"]
	}
}
```	
Stand-alone:
```		
"require": 
{
	"fluidphp/translator-helper": "*"
}
```

## Project Info

### Project Home

http://phptoolcase.com

### Requirements

php version 5.4+<br>
php-xml module
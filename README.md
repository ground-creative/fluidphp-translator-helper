 # FluidPhp Ppen Source Project Translator Helper

*A powerfull framework based on the [phptoolcase](http://phptoolcase.com) library.*

FluidPhp is a framework based on the PhpToolCase library, visit [phptoolcase.com](http://phptoolcase.com) for complete guides and examples.

This helper is to parse xml tags in your views.

## Project Info

### Project Home

http://phptoolcase.com

### Requirements

php version 5.4+

## INSTALLATION

Use composer to install the files.

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
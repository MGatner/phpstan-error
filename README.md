# phpstan-error
Demonstration of PHPStan error

## Usage

* Install: `composer update`
* Test (success): `php src/test.php`
```
MGatner\PHPStan\Fifty
50
MGatner\PHPStan\FiveExt
150
```
* Analyze (fail): `vendor/bin/phpstan analyze`
```
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   FiveExt.php                                                                                                                                        
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
         Internal error: Internal error: Expected to find an ancestor with class name MGatner\PHPStan\Five on MGatner\PHPStan\FiveExt, but none was found.  
         Run PHPStan with --debug option and post the stack trace to:                                                                                       
         https://github.com/phpstan/phpstan/issues/new                                                                                                      
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
```
* Analyze (fail): `vendor/bin/phpstan analyze --debug`
```
PHP Fatal error:  Uncaught PHPStan\ShouldNotHappenException: Internal error: Expected to find an ancestor with class name MGatner\PHPStan\Five on MGatner\PHPStan\FiveExt, but none was found. in phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Reflection/Php/PhpClassReflectionExtension.php:144
Stack trace:
#0 phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Reflection/Php/PhpClassReflectionExtension.php(124): PHPStan\Reflection\Php\PhpClassReflectionExtension->createProperty()
#1 phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Reflection/ClassReflection.php(372): PHPStan\Reflection\Php\PhpClassReflectionExtension->getProperty()
#2 phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Type/ObjectType.php(79): PHPStan\Reflection\ClassReflection->getProperty()
#3 phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Type/StaticType.php(103): PHPStan\Type\ObjectType->getProperty()
#4 phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Analyser/MutatingScope.php(2685): PHPS in phar:///opt/phpstan-error/vendor/phpstan/phpstan/phpstan/src/Reflection/Php/PhpClassReflectionExtension.php on line 144
```
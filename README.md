# WPupdatePHP library
Library to be bundled with WordPress plugins to enforce users to upgrade their PHP versions _or_ switch to a decent host.

## Installation
We recommend installing the library using [Composer](https://getcomposer.org/), as follows.

```
composer require wpupdatephp/wp-update-php
```

Another option is to download the [class file](https://github.com/WPupdatePHP/wp-update-php/blob/master/src/WPUpdatePhp.php) manually.

## Usage
Usage of this library depends on how you start your plugin. The core `does_it_meet_required_php_version` method does all the checking for you and adds an admin notice in case the version requirement is not met.

For example, when you start your plugin by instantiating a new object, you should wrap a conditional check around it. 

_Example:_
```php
$updatePhp = new WPUpdatePhp( '5.4.0' );

if ( $updatePhp->does_it_meet_required_php_version() ) {
	// Instantiate new object here
}

// The version check has failed, a admin notice has been thrown
```


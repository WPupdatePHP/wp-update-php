# WPupdatePHP library
Library to be bundled with WordPress plugins to enforce users to upgrade to PHP 5.4 hosting.

## Installation
Via Composer, obviously:

```
composer require wpupdatephp/wp-update-php
```

or download the [class file](https://github.com/WPupdatePHP/wp-update-php/blob/master/src/WPUpdatePhp.php) manually.

## Usage
Usage of this library depends on how you start your plugin. The core `does_it_meet_required_php_version` method does all the checking for you and adds an admin notice in case the required version fails.

For example, when you start your plugin by instantiating a new object, you should wrap a conditional check around it, like so:

```
$updatePhp = new WPUpdatePhp( '5.4.0' );

if ( $updatePhp->does_it_meet_required_php_version() ) {
	// Instantiate new object here
}

// The version check has failed, a admin notice has been thrown
```
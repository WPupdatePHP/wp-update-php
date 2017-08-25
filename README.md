# WPupdatePHP library
Library to be bundled with WordPress plugins to enforce users to upgrade their PHP versions _or_ switch to a decent host.

## Installation
We recommend installing the library using [Composer](https://getcomposer.org/), as follows.

```
composer require wpupdatephp/wp-update-php
```

To prevent collisions, you can install this library inside your own prefixed class names (eg `CJ_WPUpdatePhp`), using [Mozart](https://github.com/coenjacobs/mozart) and we **highly recommend doing this** as it's currently the only way to prevent hard to debug conflicts.

## Usage
Usage of this library depends on how you start your plugin. The core `check()` method does all the checking for you. You can output an admin notice in case the version requirement is not met.

For example, when you start your plugin by instantiating a new object, you should wrap a conditional check around it.

_Example:_

```php
$arguments = array(
    'php' => array(
        array(
            'version' => '7.0.0',
            'required' => false,
        ),
        array(
            'version' => '5.6.0',
            'required' => true,
        ),
    ),
);
$updatePhp = new WPUpdatePhp( 'Plugin Name', $arguments );
$updatePhp->check();

if ( $updatePhp->passes() ) {
    // Instantiate new object here
}

// The version check has failed, an admin notice can be shown
```

## Available arguments
The full list of available arguments:

```php
$arguments = array(
    'wordpress' => array(
        array(
            'version' => '3.7.1',
            'required' => false,
        ),
        array(
            'version' => '3.5.0',
            'required' => true,
        ),
    ),
    'php' => array(
        array(
            'version' => '7.0.0',
            'required' => false,
        ),
        array(
            'version' => '5.6.0',
            'required' => true,
        ),
    ),
);
```

## License
(GPLv2 license or later)

WP Update PHP Library
Copyright (C) 2015  Coen Jacobs

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

Colorizer
=========

[![Latest Stable Version](https://img.shields.io/packagist/v/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Total Downloads](https://img.shields.io/packagist/dt/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Build Status](https://img.shields.io/travis/PHLAK/Colorizer.svg)](https://travis-ci.org/PHLAK/Colorizer)
[![StyleCI](https://styleci.io/repos/18544734/shield?branch=master&style=flat)](https://styleci.io/repos/18544734)

Generate persistently unique colors from a string.

Like this project? Keep me caffeinated by [making a donation](https://paypal.me/ChrisKankiewicz).

Requirements
------------

  - [PHP](https://php.net) >= 5.6

Install with Composer
---------------------

```bash
composer require phlak/colorizer
```

Usage
-----

```php
// Import Colorizer
use Colorizer\Colorize;

// Initialize Colorizer
$colorize = new Colorize();

// Generate a Color object from 'foo'
$color = $colorize->text('foo'); // Returns a new Color object

// Get the red, green and blue values
$color->red;    // 165
$color->green;  // 196
$color->blue;   // 254

// Generate a hex color code
$color->hex();  // Returns '#a5c4fe'

// Generate a RGB color code
$color->rgb();  // Returns 'rgb(165, 196, 254)'
```

#### Normalizing Colors

You can enforce RGB values to fall within a certain range to prevent colors
from being too bright or dark.  This is possible by passing minimum and maximum
normalization values (0-255) to the Colorize class on initialization:

```php
$colorize = new Colorize(64, 224);
```

or fluently:

```php
$colorize->text('foo')->normalize(64, 224)->rgb();  // Returns 'rgb(165, 196, 224)'
```

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/Colorizer/releases) page.

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/Colorizer/issues).

Copyright
---------

This project is licensed under the [MIT License](https://github.com/PHLAK/Colorizer/blob/master/LICENSE).

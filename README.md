Colorizer
=========

[![Latest Stable Version](https://img.shields.io/packagist/v/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Total Downloads](https://img.shields.io/packagist/dt/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Build Status](https://img.shields.io/travis/PHLAK/Colorizer.svg)](https://travis-ci.org/PHLAK/Colorizer)

Generate persistently unique colors from a string.

Like this project? Keep me caffeinated by [making a donation](https://paypal.me/ChrisKankiewicz).

Install with Composer
---------------------

```bash
composer require phlak/colorizer
```

Usage
-----

```php
// Import Colorizer
use Colorizer;

// Initialize Colorizer
$colorize = new Colorizer\Colorize();

// Generate a hex color code from 'foo'
$hexColor = $colorize->toHex('foo');  // Returns '#a5c4e0'

// Generate a RGB color code from 'bar'
$rgbColor = $colorize->toRGB('bar');  // Returns 'rgb(238, 215, 222)'
```

#### Normalizing Colors

You can enforce RGB values to fall within a certain range to prevent colors
from being too bright or dark.  This is possible by passing minimum and maximum
normalization values (0-255) to the Colorize class on initialization:

```php
$colorize = new Colorizer\Colorize(64, 224);
```

or on an already existing object:

```php
$colorize->normalize(64, 224);
```

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/Colorizer/issues).

Copyright
---------

This project is liscensed under the [MIT License](https://github.com/PHLAK/Colorizer/blob/master/LICENSE).

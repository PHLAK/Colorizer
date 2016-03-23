Colorizer.php
=============

[![Latest Stable Version](https://img.shields.io/packagist/v/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Total Downloads](https://img.shields.io/packagist/dt/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/phlak/colorizer.svg)](https://packagist.org/packages/phlak/colorizer)
[![Build Status](https://img.shields.io/travis/PHLAK/colorizer.svg)](https://travis-ci.org/PHLAK/colorizer)

Generate persistently unique colors from a string.

Like this project? Want to keep it free? [Make a donation](https://www.paypal.me/ChrisKankiewicz).

### Install with Composer

```bash
$ composer.phar require phlak/colorizer:^1.3
```

### Example usage

```php
// Initialize Colorizer
$colorize = new Colorizer\Colorize();

// Generate a hex color code from 'foo'
$hexColor = $colorize->toHex('foo');  // Returns '#a5c4e0'
```

### Normalizing Colors

You can enforce RGB values to fall within a certain range to prevent colors
from being too bright or dark.  This is possible by passing minimum and maximum
normalization values (0-255) to the Colorize class on initialization:

```php
$colorize = new Colorizer\Colorize(64, 224);
```

-----

**Copyright (c) 2016 Chris Kankewicz <Chris@ChrisKankiewicz.com>**

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

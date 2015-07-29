<?php

    // Load Colorizer classes
    require_once '../src/Colorizer/Colorize.php';
    require_once '../src/Colorizer/Color.php';

    // Initialize Colorizer
    $colorize = new Colorizer\Colorize(64, 224);

    // Examples array
    $animals = array(
        'dog', 'cat', 'horse', 'fish', 'orangutan', 'hippopotamus',
        'zebra', 'alligator', 'rhinocerous', 'lion', 'tiger', 'rabbit',
        'cow', 'bird', 'coyote', 'shark', 'pelican', 'weasel'
    );

?>

<div class="swatches">

    <h3>Hex Test</h3>

    <?php foreach ($animals as $animal): ?>

        <div class="swatch-wrapper">
            <div class="swatch" style="background-color: <?php echo $colorize->toHex($animal); ?>;">
                <?php echo $animal; ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>

<div class="swatches">

    <h3>RGB Test</h3>

    <?php foreach ($animals as $animal): ?>

        <?php $color = $colorize->toRGB($animal); ?>

        <div class="swatch-wrapper">
            <div class="swatch" style="background-color: rgb(<?php echo $color->red; ?>, <?php echo $color->green; ?>, <?php echo $color->blue; ?>);">
                <?php echo $animal; ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>

<style type="text/css">

    .swatches {
        float: left;
        margin: 0 1%;
        width: 48%;
    }

    .swatches h3 {
        border-bottom: 1px dotted #CCC;
        color: #555;
        font-family: sans-serif;
        font-size: 1em;
        font-weight: normal;
    }

    .swatch-wrapper {
        border-radius: 4px;
        border: 1px solid #CCC;
        display: inline-block;
        float: left;
        margin: 6px;
        padding: 3px;
    }

    .swatch {
        color: #FFF;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 1.25em;
        height: 80px;
        line-height: 80px;
        text-align: center;
        text-shadow: 0 0 5px rgba(0, 0, 0, .15);
        width: 160px;
    }

</style>

<?php
    header("Content-type: text/css");
    $startWidth = 1; 
    $endWidth = 100;
    $step = 1; 

    for ($width = $startWidth; $width <= $endWidth; $width += $step) {
        echo ".w-$width { width: $width%; } .wi-$width{width:{$width}% !important}";
    }
    for ($height = $startWidth; $height <= $endWidth; $height += $step) {
        echo ".maxheight-$height { max-height: {$height}vh; overflow:auto; }";
    }
    for ($height = $startWidth; $height <= $endWidth; $height += $step) {
        echo ".height-$height { height: {$height}px;}";
    }
    // Margin-Top
    for ($margin = 0; $margin <= 30; $margin ++) {
        echo ".mt-$margin { margin-top: {$margin}px !important; } .ml-$margin { margin-left: {$margin}px !important; } .mr-$margin { margin-right: {$margin}px !important; } .mb-$margin { margin-bottom: {$margin}px !important; } .pt-$margin{padding-top: {$margin}px;} .pl-$margin{padding-left: {$margin}px;} .pr-$margin{padding-right: {$margin}px;} .pb-$margin{padding-bottom: {$margin}px;}";
    }
    echo ".floatleft{float:left}.floatright{float:right}.clear{clear:both}.padding{padding: 14px 10px 0 14px}.padding10{padding: 0 10px 10px}.relative{position:relative}.absolute{position:absolute}";
?>
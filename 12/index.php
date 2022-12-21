<?php

function drawStars($count) {
    $values = array(
        40, 0,
        50, 30,
        80, 30,
        57, 46,
        65, 75,
        40, 60,
        15, 75,
        23, 46,
        0, 30,
        30, 30,
    );

    $image = imagecreatetruecolor(2400, 1200);
    $background = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $background);
    $black = imagecolorallocate($image, 0, 0, 0);

    function newStar($value) {
        return $value + 100;
    }

    for ($i = 0; $i < $count; $i++) {
        $values = array_map(newStar, $values);
        
        imageFilledPolygon($image, $values, 10, $black);
    }

    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
}

function addFilters() {
    $image = imagecreatefromjpeg('donut.jpg');
    header('Content-type: image/png');
    
    if($image && imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR)) {
        imagejpeg($image);
    }

    // if($image && imagefilter($image, IMG_FILTER_MEAN_REMOVAL)) {
    //     imagejpeg($image);
    // }
    
    imagedestroy($image);
}

function drawMouse() {
    $image = imagecreatetruecolor(670, 504);
    $background = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $background);
    $black = imagecolorallocate($image, 0, 0, 0);
    $gray = imagecolorallocate($image, 153, 153, 153);
    $pink = imagecolorallocate($image, 237, 189, 188);

    imageFilledPolygon($image, [245, 230, 305, 472, 96, 431], 3, $gray);
    imageFilledPolygon($image, [380, 110, 410, 380, 185, 196], 3, $gray);
    imagefilledellipse($image, 150, 175, 150, 150, $gray);
    imagefilledellipse($image, 175, 185, 75, 75, $pink);
    imagefilledellipse($image, 385, 75, 140, 140, $gray);
    imagefilledellipse($image, 375, 95, 65, 65, $pink);
    imagefilledellipse($image, 304, 234, 14, 14, $black);
    imagefilledellipse($image, 343, 217, 14, 14, $black);
    imagefilledellipse($image, 410, 380, 20, 20, $black);
    imagearc($image, 155, 425, 100, 100, 0, 180, $black);
    imagearc($image, 60, 405, 100, 100, 180, 24, $black);
    imageLine($image, 365, 380, 450, 378, $black);
    imageLine($image, 375, 410, 445, 345, $black);

    imageFilledPolygon($image, [465, 315, 605, 260, 580, 375], 3, $gray);
    imageFilledPolygon($image, [500, 465, 545, 350, 605, 455], 3, $gray);
    imagefilledellipse($image, 620, 265, 75, 75, $gray);
    imagefilledellipse($image, 615, 270, 40, 40, $pink);
    imagefilledellipse($image, 600, 390, 75, 75, $gray);
    imagefilledellipse($image, 590, 380, 32, 32, $pink);
    imagefilledellipse($image, 550, 310, 8, 8, $black);
    imagefilledellipse($image, 547, 332, 8, 8, $black);
    imagefilledellipse($image, 470, 315, 8, 8, $black);
    imagearc($image, 525, 455, 60, 60, 0, 180, $black);
    imagearc($image, 468, 445, 60, 60, 180, 21, $black);
    imageLine($image, 465, 293, 475, 340, $black);
    imageLine($image, 476, 297, 461, 335, $black);
    
    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
}

// drawStars(rand(1, 10));
// addFilters();
drawMouse();
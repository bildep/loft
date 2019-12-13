<?php
require __DIR__ .'/vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

$source = __DIR__ . '/1.jpg';
$result = __DIR__ . '/1_new.png';


$image = Image::make($source)
    ->resize(200, null, function ($image) {
        $image->aspectRatio();
    })->text(
    "Copyright",
    70,
    120,
    function ($font) {
        $font->file(__DIR__ . '/arial.ttf')->size('24'); //требуется расширение freetype
        $font->color(array(0, 0, 0, 0.5));
        $font->align('left');
        $font->valign('bottom');
    })->rotate(45) ->save($result, 80);

echo $image->response('png');
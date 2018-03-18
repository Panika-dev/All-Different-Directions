<?php
require __DIR__ . '/vendor/autoload.php';

use App\Destinations;

if ($_SERVER['argc'] > 1) {
    $filePath = $_SERVER['argv'][1];

    $file = file_get_contents($filePath);

    $destinations = new Destinations();

    //Fully trust the source
    $destinations->parseDestionations($file);

    echo $destinations->result();

} else {
    throw new Exception("Use `php run.php /examples/1.txt`");
}
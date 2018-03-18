<?php
namespace App;

use App\Contracts\DestinationsInterface;
use App\Contracts\ParserInterface;

class Parser implements ParserInterface {

    /**
     * Fully trust the source
     *
     * @param string $data
     * @param DestinationsInterface $destinations
     *
     * @return array Destinations with Directions with Steps
     */
    public static function parseData(string $data, DestinationsInterface $destinations):array
    {
        $lines = explode("\n", $data);

        $selectorLine = 0;

        while (($countDirections = intval($lines[$selectorLine])) && ($countDirections > 0)) {
            $destination = new Destination();

            for ($i = $selectorLine + 1; $i <= $selectorLine + $countDirections; $i++) {

                $derectionData = explode(' ', $lines[$i]);

                $startX = $derectionData[0];
                $startY = $derectionData[1];
                $startAngle = $derectionData[3];

                $direction = new Direction($startX, $startY, $startAngle);

                $numberActionStep = 4;

                while (isset($derectionData[$numberActionStep])
                       && isset($derectionData[$numberActionStep + 1])
                ) {
                    $action = $derectionData[$numberActionStep];
                    $arg = $derectionData[$numberActionStep + 1];

                    $step = new Step($action, $arg);
                    $direction->addStep($step);

                    $numberActionStep += 2;
                }

                $destination->addDirection($direction);
            }

            $destinations->addDestination($destination);

            $selectorLine += $countDirections + 1;
        }

        return $destinations->getDestinations();
    }
}
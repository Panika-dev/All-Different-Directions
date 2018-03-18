<?php

namespace App\Tests;

use App\Destinations;

/**
 * AppDirectionsTest
 */
class AppDirectionsTest extends \PHPUnit_Framework_TestCase{

    /**
     * @return array
     */
    public function dataFileNamesAndResult()
    {
        return [
            "examples/1.txt" => "97.15 40.23 7.63\n30 45 0\n",
            "examples/2.txt" => "27.45 45.58 11.27\n0.66 1.49 30.91\n",
            "examples/3.txt" => "97.15 40.23 7.63\n30 45 0\n",
        ];
    }

    /**
     * @param string $payload
     */
    public function test_global($payload) {

        /** @var Destinations $destinations */
        $destinations = new Destinations();

        foreach ($this->dataFileNamesAndResult() as $fileName => $result) {
            $destinations->parseDestionations(file_get_contents($fileName));

            $this->assertEquals($result, $destinations->result());
        }

    }
}
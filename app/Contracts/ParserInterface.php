<?php

namespace App\Contracts;


/**
 * Interface ParserInterface
 */
interface ParserInterface {

    /**
     * @param string $data
     * @param DestinationsInterface $destinations
     *
     * @return array
     */
    public static function parseData(string $data, DestinationsInterface $destinations): array;
}
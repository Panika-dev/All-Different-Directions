<?php

namespace App\Contracts;


/**
 * Interface DestinationsInterface
 */
interface DestinationsInterface {

    /**
     * @return string
     */
    public function result(): string;

    /**
     * @param DestinationInterface $destination
     *
     * @return void
     */
    public function addDestination(DestinationInterface $destination);

    /**
     * @return array
     */
    public function getDestinations(): array;

    /**
     * @param string $data
     *
     * @return void
     */
    public function parseDestionations(string $data);
}
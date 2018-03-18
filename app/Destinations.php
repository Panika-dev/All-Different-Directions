<?php

namespace App;

use App\Contracts\DestinationInterface;
use App\Contracts\DestinationsInterface;

class Destinations implements DestinationsInterface {

    /**
     * @var array
     */
    public $destinations = [];

    /**
     * @param DestinationInterface $destination
     */
    public function addDestination(DestinationInterface $destination)
    {
        $this->destinations[] = $destination;
    }

    /**
     * @return string
     */
    public function result(): string
    {
        $result = '';

        /** @var Destination $destination */
        foreach ($this->destinations as $destination) {
            $result .= $destination->result() . "\n";
        }

        return $result;
    }

    /**
     * @param $data
     */
    public function parseDestionations($data)
    {
        $this->destinations = Parser::parseData($data, $this);
    }

    /**
     * @return array
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }
}
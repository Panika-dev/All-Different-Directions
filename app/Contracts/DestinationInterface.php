<?php

namespace App\Contracts;


/**
 * Interface DestinationInterface
 */
interface DestinationInterface {

    /**
     * @return float
     */
    public function getMaxWorstDirectionDistance(): float;

    /**
     * @param DirectionInterface $direction
     *
     * @return void
     */
    public function addDirection(DirectionInterface $direction);

    /**
     * @return string
     */
    public function result(): string;
}
<?php

namespace App\Contracts;


/**
 * Interface DirectionInterface
 */
interface DirectionInterface {

    /**
     * StepInterface $step
     *
     * @return void
     */
    public function addStep(StepInterface $step);

    /**
     * @return float;
     */
    public function getEndX(): float;

    /**
     * @return float;
     */
    public function getEndY(): float;
}
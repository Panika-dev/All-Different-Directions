<?php

namespace App\Contracts;


interface StepInterface {

    /**
     * @return float
     */
    public function getArg(): float;

    /**
     * @return string
     */
    public function getAction(): string;

}
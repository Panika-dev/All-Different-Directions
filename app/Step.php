<?php
namespace App;

use App\Contracts\StepInterface;

class Step implements StepInterface {

    /**
     * @var string
     */
    public $action;

    /**
     * @var float
     */
    public $arg;

    /**
     * Step constructor.
     *
     * @param string $action
     * @param float $arg
     */
    public function __construct(string $action, float $arg) {
        $this->action = $action;
        $this->arg = $arg;
    }

    /**
     * @return float
     */
    public function getArg(): float
    {
        return $this->arg;
    }

    /**
     * @return string
     */
    public function getAction(): string {
        return $this->action;
    }

}
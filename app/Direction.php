<?php
namespace App;

use App\Contracts\DirectionInterface;
use App\Contracts\StepInterface;

class Direction implements DirectionInterface {

    const WALK = 'walk';
    const TURN = 'turn';

    /**
     * @var float
     */
    public $x;

    /**
     * @var float
     */
    public $y;

    /**
     * @var float
     */
    public $angle;
    /**
     * @var float
     */
    public $endX;

    /**
     * @var float
     */
    public $endY;

    /**
     * @var float
     */
    public $endAngle;

    /**
     * @var array
     */
    public $steps = [];

    /**
     * Direction constructor.
     *
     * @param float $x
     * @param float $y
     * @param float $angle
     */
    public function __construct(float $x, float $y, float $angle) {
        $this->x = $x;
        $this->y = $y;
        $this->angle = $angle;
        $this->endX = $x;
        $this->endY = $y;
        $this->endAngle = $angle;
    }

    /**
     * @return float
     */
    public function getEndX(): float {
        return $this->endX;
    }

    /**
     * @return float
     */
    public function getEndY(): float {
        return $this->endY;
    }

    /**
     * @param StepInterface $step
     */
    public function addStep(StepInterface $step) {
        $this->steps[] = $step;

        $this->go();
    }

    /**
     * @return mixed
     */
    private function go()
    {
        $this->endX = $this->x;
        $this->endY = $this->y;
        $angle = $this->angle;
        $walk = 0;

        /**
         * @var StepInterface $step
         */
        foreach ($this->steps as $keyStep => $step) {
            switch ($step->getAction()) {
                case self::WALK:
                    $walk += $step->getArg();

                    //Checking the next step for an escape from the order walk and turn
                    if (!isset($this->steps[$keyStep + 1]) || $this->steps[$keyStep + 1]->getAction() !== self::WALK) {
                        $this->endX += $walk * cos($angle * M_PI / 180);
                        $this->endY += $walk * sin($angle * M_PI / 180);

                        $walk = 0;
                    }
                    break;
                case self::TURN:
                    $angle += $step->getArg();
                    break;
                default:
                    //f.e. exception
                    break;
            }
        }
    }
}
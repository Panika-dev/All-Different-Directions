<?php
namespace App;

use App\Contracts\DestinationInterface;
use App\Contracts\DirectionInterface;

class Destination implements DestinationInterface {

    /**
     * @var array
     */
    public $directions = [];

    /**
     * @var float
     */
    public $x;

    /**
     * @var float
     */
    public $y;

    /**
     * @param DirectionInterface $direction
     */
    public function addDirection(DirectionInterface $direction) {
        $this->directions[] = $direction;

        $this->calculateAvg();
    }

    /**
     * @return mixed
     */
    private function calculateAvg() {
        $sumX = 0;
        $sumY = 0;
        $count = count($this->directions);

        /** @var DirectionInterface $direction */
        foreach ($this->directions as $direction) {
            $sumX += $direction->getEndX();
            $sumY += $direction->getEndY();
        }

        $this->x = $sumX/$count;
        $this->y = $sumY/$count;
    }

    /**
     * @return float
     */
    public function getMaxWorstDirectionDistance(): float
    {
        $destinations = [];

        /** @var DirectionInterface $direction */
        foreach ($this->directions as $direction) {
            $destinations[] = hypot(
                $this->x - $direction->getEndX(),
                $this->y - $direction->getEndY()
            );
        }

        return max($destinations);
    }

    /**
     * @return string
     */
    public function result(): string
    {
        $precision = 2;

        return implode(' ', [
                round($this->x, $precision),
                round($this->y, $precision),
                round($this->getMaxWorstDirectionDistance(), $precision)
            ]);
    }
}
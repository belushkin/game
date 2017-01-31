<?php

namespace game\Figures\Airplanes;

class AirplanePropellant implements \game\Figures\PropellantInterface
{

    private $figure;
    private $movementY;
    private $windowHeight;
    private $windowWidth;
    private $hasEnded = false;

    public function __construct(\game\Figures\FigureInterface $figure)
    {
        $this->figure = $figure;
    }

    public function setWindowHeight($height)
    {
        $this->windowHeight = $height;
    }

    public function setWindowWidth($width)
    {
        $this->windowWidth = $width;
    }

    public function handleKeys($key)
    {
        $targetMovementY = 0;

        // Get the last chunk of a snake
//        if(count($this->snake) > 0)
//            $head = $this->snake[ count($this->snake) - 1 ];

        // Movement keys
        if($key == 'w') {
            $targetMovementY = -1;
        } else if($key == 's') {
            $targetMovementY = 1;
        }

        // Calculate where the new head will be
        //$targetPosition = array(0, $head[1] + $targetMovementY);
        $targetPosition = array($this->figure->getOutputter()->getX(), $this->figure->getOutputter()->getY() + $targetMovementY);

        // Turn only when it's safe (there won't be a collision with a wall)
        if(!$this->isBlocked($targetPosition))
        {
            $this->movementY = $targetMovementY;
        }
    }

    private function isBlocked($position)
    {
        // Position is outside the map
        if($position[1] >= ($this->windowHeight - 3) || $position[1] <= 0) {
            return true;
        }
        return false;
    }

    public function handleMovement()
    {
        $newPosition = array($this->figure->getOutputter()->getX(), $this->figure->getOutputter()->getY() + $this->movementY);
        // If a player hits a wall or the snake - game over
        if($this->isBlocked($newPosition))
        {
            $this->hasEnded = true;
            return;
        }
        $this->figure->getOutputter()->setY($this->figure->getOutputter()->getY() + $this->movementY);
    }

}

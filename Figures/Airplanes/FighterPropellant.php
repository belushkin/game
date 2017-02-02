<?php

namespace game\Figures\Airplanes;

class FighterPropellant implements \game\Figures\PropellantInterface
{

    private $figure;
    private $movementX;
    private $movementY;
    private $windowHeight = 0;
    private $windowWidth = 0;
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

    public function getWindowWidth()
    {
        return $this->windowWidth;
    }

    public function getWindowHeight()
    {
        return $this->windowHeight;
    }

    public function getMovement()
    {
        return array($this->movementX, $this->movementY);
    }

    public function hasEnded()
    {
        return $this->hasEnded;
    }

    public function start()
    {
        $this->hasEnded = false;
    }

    public function handleKeys($key)
    {
        $targetMovementY = 0;

        // Movement keys
        if($key == 'w') {
            $targetMovementY = -1;
        } else if($key == 's') {
            $targetMovementY = 1;
        }

        // Calculate where the new head will be
        $targetPosition = array($this->figure->getOutputter()->getX(), $this->figure->getOutputter()->getY() + $targetMovementY);

        // Turn only when it's safe (there won't be a collision with a wall)
        if($this->isBlocked($targetPosition)) {
            return false;
        }

        $this->movementY = $targetMovementY;
        return true;
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
        // If a player hits a wall game over
        if($this->isBlocked($newPosition)) {
//            $this->hasEnded = true;
            return false;
        }
        $this->figure->getOutputter()->setY($this->figure->getOutputter()->getY() + $this->movementY);
    }

}

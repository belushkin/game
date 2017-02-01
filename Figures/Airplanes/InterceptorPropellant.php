<?php

namespace game\Figures\Airplanes;

class InterceptorPropellant implements \game\Figures\PropellantInterface
{

    private $figure;
    private $movementX;
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

    public function getWindowWidth()
    {
        return $this->windowWidth;
    }

    public function getWindowHeight()
    {
        return $this->windowHeight;
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
        $targetMovementX = 4;

        // Calculate where the new head will be
        $targetPosition = array($this->figure->getOutputter()->getX() - $targetMovementX, $this->figure->getOutputter()->getY());

        // Turn only when it's safe (there won't be a collision with a wall)
        if(!$this->isBlocked($targetPosition)) {
            $this->movementX = $targetMovementX;
        }
    }

    private function isBlocked($position)
    {
        // Position is outside the map
        if($position[0] <= 0) {
            return true;
        }
        return false;
    }

    public function handleMovement()
    {
        $newPosition = array($this->figure->getOutputter()->getX() - $this->movementX, $this->figure->getOutputter()->getY());

        // If a player hits a wall - game over
        if($this->isBlocked($newPosition)) {
            $this->hasEnded = true;
            return false;
        }
        $this->figure->getOutputter()->setX($this->figure->getOutputter()->getX() - $this->movementX);
    }

}

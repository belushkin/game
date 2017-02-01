<?php

namespace game\Figures\Airplanes;

class Interceptor extends \game\Figures\Airplanes\AirplaneAbstract implements
    \game\Figures\FigureOutputterInterface,
    \game\Figures\FigurePropellantInterface,
    \game\Figures\FigureInterface
{

    private $outputter;
    private $propellant;

    public function init()
    {
        $windowWidth = $this->getPropellant()->getWindowWidth();
        $windowHeight = $this->getPropellant()->getWindowHeight();

        $this->getOutputter()->setX(mt_rand(round($windowWidth / 2), $windowWidth));
        $this->getOutputter()->setY(mt_rand(10, $windowHeight - 10));
        $this->getPropellant()->start();
    }

    public function setOutputter(\game\Figures\OutputterInterface $outputter)
    {
        $this->outputter = $outputter;
    }

    public function getOutputter()
    {
        return $this->outputter;
    }

    public function setPropellant(\game\Figures\PropellantInterface $propellant)
    {
        $this->propellant = $propellant;
    }

    public function getPropellant()
    {
        return $this->propellant;
    }

}

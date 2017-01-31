<?php

namespace game\Figures\Airplanes;

class Fighter extends \game\Figures\Airplanes\AirplaneAbstract implements
    \game\Figures\FigureOutputterInterface,
    \game\Figures\FigurePropellantInterface,
    \game\Figures\FigureInterface
{

    private $outputter;
    private $propellant;

    public function init()
    {
        $this->getOutputter()->setX(10);
        $this->getOutputter()->setY(10);
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

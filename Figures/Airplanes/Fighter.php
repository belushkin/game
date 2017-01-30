<?php

namespace game\Figures\Airplanes;

class Fighter extends \game\Figures\Airplanes\AirplaneAbstract implements
    \game\Figures\FigureOutputterInterface,
    \game\Figures\FigureInterface,
    \game\Figures\FigureMovesInterface
{

    private $plane = array();
    private $outputter;
    private $x = 0;
    private $y = 0;

    public function init()
    {
        // Create the initial plane
        $this->plane = array(
            array(5, 5),
            array(6, 5)
        );
        $this->setX(0);
        $this->setY(0);
    }

    private function setX($x)
    {
        $this->x = $x;
    }

    private function setY($y)
    {
        $this->y = $y;

    }

    private function getX()
    {
        return $this->x;
    }

    private function getY()
    {
        return $this->y;
    }

    public function setOutputter(\game\Figures\OutputterInterface $outputter)
    {
        $this->outputter = $outputter;
    }

    public function getOutputter(\game\Figures\OutputterInterface $outputter)
    {
        return $this->outputter;
    }

    public function up()
    {

    }

    public function down()
    {

    }

    public function left()
    {

    }

    public function right()
    {

    }

}
<?php

namespace game\Figures\Backgrounds;

class Dots extends \game\Figures\Backgrounds\BackgroundAbstract implements
    \game\Figures\FigureOutputterInterface,
    \game\Figures\FigureInterface
{

    private $outputter;

    public function init()
    {
    }

    public function setOutputter(\game\Figures\OutputterInterface $outputter)
    {
        $this->outputter = $outputter;
    }

    public function getOutputter()
    {
        return $this->outputter;
    }

}

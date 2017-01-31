<?php

namespace game\Figures\Airplanes;

class FighterPresentation implements \game\Figures\PresentationInterface
{

    private $presentation = array(
        array('', '|', '\\', '', ''),
        array('}', '=', '-', '0', '>'),
        array('', '|', '/', '', '')
    );

    public function getPresentation()
    {
        return $this->presentation;
    }

    public function getWidth()
    {
        return count($this->presentation[0]);
    }

    public function getHeight()
    {
        return sizeof($this->presentation);
    }

}

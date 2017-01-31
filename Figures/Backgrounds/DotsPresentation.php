<?php

namespace game\Figures\Backgrounds;

class DotsPresentation implements \game\Figures\PresentationInterface
{

    private $presentation = '.';

    public function getPresentation()
    {
        return $this->presentation;
    }

    public function getWidth()
    {
        return exec('tput cols');
    }

    public function getHeight()
    {
        return exec('tput lines');
    }

}

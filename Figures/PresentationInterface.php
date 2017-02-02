<?php

namespace game\Figures;

interface PresentationInterface
{

    public function getPresentation();
    public function setPresentation(Array $presentation = array());
    public function getWidth();
    public function getHeight();

}

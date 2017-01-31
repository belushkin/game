<?php

namespace game\Figures;

interface FigurePresentationInterface
{

    public function setPresentation(\game\Figures\PresentationInterface $presentation);
    public function getPresentation();

}

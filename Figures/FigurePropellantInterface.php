<?php

namespace game\Figures;

interface FigurePropellantInterface
{

    public function setPropellant(\game\Figures\PropellantInterface $propellant);
    public function getPropellant();

}

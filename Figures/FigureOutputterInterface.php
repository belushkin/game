<?php

namespace game\Figures;

interface FigureOutputterInterface
{

    public function setOutputter(\game\Figures\OutputterInterface $outputter);
    public function getOutputter();

}

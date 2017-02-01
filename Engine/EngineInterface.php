<?php

namespace game\Engine;

interface EngineInterface
{

    public function run();
    public function addFigure(\game\Figures\FigureInterface $figure);

}

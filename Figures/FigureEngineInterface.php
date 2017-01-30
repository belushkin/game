<?php

namespace game\Figures;

interface FigureEngineInterface
{

    public function setEngine(\game\Engine\EngineInterface $engine);
    public function getEngine(\game\Engine\EngineInterface $engine);

}

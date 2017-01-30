<?php

namespace game\Figures;

interface OutputterInterface
{

    public function draw(\game\Engine\EngineInterface $engine);
}
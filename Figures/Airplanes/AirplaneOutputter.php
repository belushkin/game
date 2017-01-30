<?php

namespace game\Figures\Airplanes;

class AirplaneOutputter implements
    \game\Figures\OutputterInterface
{

    public function draw(\game\Engine\EngineInterface $engine)
    {
        for ($i = 0; $i < $winy; $i++) {
            for ($j = 0; $j < $winx; $j++) {
                $engine->echoString($i, $j, '.');
            }
        }
    }

}
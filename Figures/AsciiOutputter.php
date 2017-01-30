<?php

namespace game\Figures;

class AsciiOutputter implements
    \game\Figures\OutputterInterface,
    \game\Figures\FigureEngineInterface
{

    private $engine;

    public function setEngine(\game\Engine\EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function getEngine(\game\Engine\EngineInterface $engine)
    {
        return $this->engine;
    }

    public function draw()
    {
        $this->engine->clear();
        $this->engine->getDimensions();

        ncurses_wattron($this->window, NCURSES_A_REVERSE);
        // draw dots
        for ($i = 0; $i < $winy; $i++) {
            for ($j = 0; $j < $winx; $j++) {
                $this->engine->echoString($i, $j, '.');
            }
        }
        ncurses_wattroff($this->window, NCURSES_A_REVERSE);
    }

}
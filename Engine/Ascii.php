<?php

namespace game\Engine;

class Ascii implements EngineInterface
{

    private $window;
    private $boardSize = array();
    private $figures = array();

    public function __construct(Array $figures = array())
    {
        foreach ($figures as $figure) {
            if ($figure instanceof \game\Figures\FigureInterface) {
                $this->figures[] = $figure;
            }
        }
    }

    private function restart()
    {
        foreach ($this->figures as $figure) {
            $figure->init();
        }
    }

    public function run()
    {
        $this->draw();
    }

    public function draw()
    {
        foreach ($this->figures as $figure) {
            $figure->getOutputter()->draw($this);
        }
    }

    public function echoString($y, $x, $string = '')
    {
        echo $string;
    }

}

<?php

namespace game\Figures;

class AsciiOutputter implements
    \game\Figures\OutputterInterface,
    \game\Figures\FigurePresentationInterface,
    \game\Figures\FigureMovesInterface
{

    private $presentation;
    private $x = 0;
    private $y = 0;

    public function setPresentation(\game\Figures\PresentationInterface $presentation)
    {
        $this->presentation = $presentation;
    }

    public function getPresentation()
    {
        return $this->presentation;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function draw(\game\Engine\EngineInterface $engine)
    {
        $matrix = $this->presentation->getPresentation();

        for ($i = 0; $i < $this->presentation->getHeight(); $i++) {
            for ($j = 0; $j < $this->presentation->getWidth(); $j++) {
                if (is_string($matrix)) {
                    $engine->echoString($i, $j, $matrix);
                } else {
                    $engine->echoString($this->getY() + $i, $this->getX() + $j, $matrix[$i][$j]);
                }

            }
            //$engine->echoString($i, $j, "\n");
        }
    }

}

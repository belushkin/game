<?php

namespace game\Engine;

use \Mockery as m;

class NcursesTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function testEngineReceivesFigures()
    {
        $figure = m::mock('game\Figures\Airplanes\Fighter');
        $engine   = new \game\Engine\Ncurses(array(
            $figure
        ));

        assertThat(count($engine->getFigures()), equalTo(1));
    }

    public function testAddNewFigures()
    {
        $figure = m::mock('game\Figures\Airplanes\Fighter');
        $engine   = new \game\Engine\Ncurses(array(
            $figure
        ));
        $engine->addFigure($figure);

        assertThat(count($engine->getFigures()), equalTo(2));
    }

}
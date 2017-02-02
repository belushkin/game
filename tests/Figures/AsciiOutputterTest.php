<?php

namespace game\Figures;

use \Mockery as m;

class AsciiOutputterTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function testOutputterXY()
    {
        $outputter = new \game\Figures\AsciiOutputter();
        $outputter->setX(1);
        $outputter->setY(3);

        assertThat($outputter->getX(), equalTo(1));
        assertThat($outputter->getY(), equalTo(3));
    }

    public function testOutputterDraw()
    {
        $presentation = m::mock('game\Figures\Airplanes\FighterPresentation');
        $presentation->shouldReceive('getPresentation')->times(1)->andReturn(array(
            array(0,0,0),
            array(0,0,0)
        ));

        $presentation->shouldReceive('getHeight')->times(3)->andReturn(2);
        $presentation->shouldReceive('getWidth')->times(8)->andReturn(3);

        $outputter = new \game\Figures\AsciiOutputter();
        $outputter->setPresentation($presentation);

        $engine = m::mock('game\Engine\Ncurses');
        $engine->shouldReceive('echoString')->times(6);
        $outputter->draw($engine);
    }

}

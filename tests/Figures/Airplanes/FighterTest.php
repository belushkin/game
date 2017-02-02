<?php

namespace game\Figures\Airplanes;

use \Mockery as m;

class FighterTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function testOutputterNotExists()
    {
        $outputter = m::mock('game\Figures\AsciiOutputter');
        $outputter->shouldReceive('setX')->times(0);
        $outputter->shouldReceive('setY')->times(0);

        $figure = new \game\Figures\Airplanes\Fighter();
        $figure->init();
    }

    public function testOutputterExists()
    {
        $outputter = m::mock('\game\Figures\AsciiOutputter');
        $outputter->shouldReceive('setX')->times(1);
        $outputter->shouldReceive('setY')->times(1);

        $figure = new \game\Figures\Airplanes\Fighter();
        $figure->setOutputter($outputter);
        $figure->init();
    }

}
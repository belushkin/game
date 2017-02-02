<?php

namespace game\Figures\Airplanes;

use \Mockery as m;

class FighterPropellantTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function testHandleKeysWithWrongKey()
    {
        $figure = new \game\Figures\Airplanes\Fighter();
        $outputter = m::mock('game\Figures\AsciiOutputter');
        $outputter->shouldReceive('getX')->times(1)->andReturn(10);
        $outputter->shouldReceive('getY')->times(1)->andReturn(10);

        $figure->setOutputter($outputter);
        $propellant = new \game\Figures\Airplanes\FighterPropellant($figure);
        $propellant->setWindowHeight(20);
        $propellant->setWindowWidth(20);

        $propellant->handleKeys('0');

        assertThat($propellant->getMovement()[1], equalTo(0));
    }

    public function testHandleKeysWithRightKey()
    {
        $figure = new \game\Figures\Airplanes\Fighter();
        $outputter = m::mock('game\Figures\AsciiOutputter');
        $outputter->shouldReceive('getX')->times(1)->andReturn(10);
        $outputter->shouldReceive('getY')->times(1)->andReturn(10);

        $figure->setOutputter($outputter);
        $propellant = new \game\Figures\Airplanes\FighterPropellant($figure);
        $propellant->setWindowHeight(20);
        $propellant->setWindowWidth(20);

        $propellant->handleKeys('s');

        assertThat($propellant->getMovement()[1], equalTo(1));
    }

    public function testHandleMovement()
    {
        $figure = new \game\Figures\Airplanes\Fighter();
        $outputter = m::mock('game\Figures\AsciiOutputter');
        $outputter->shouldReceive('getX')->twice()->andReturn(10);
        $outputter->shouldReceive('getY')->times(3)->andReturn(10);
        $outputter->shouldReceive('setY')->once();

        $figure->setOutputter($outputter);
        $propellant = new \game\Figures\Airplanes\FighterPropellant($figure);
        $propellant->setWindowHeight(20);
        $propellant->setWindowWidth(20);

        $propellant->handleKeys('s');
        $propellant->handleMovement();
    }

}

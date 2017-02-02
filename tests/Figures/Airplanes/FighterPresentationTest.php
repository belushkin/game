<?php

namespace game\Figures\Airplanes;

class FighterPresentationTest extends \PHPUnit_Framework_TestCase
{

    public function testPresentationEmpty()
    {
        $presentation = new \game\Figures\Airplanes\FighterPresentation();
        $presentation->setPresentation(array());
        assertThat($presentation->getPresentation(), is(EmptyArray()));
    }

    public function testPresentationDimensions()
    {
        $presentation = new \game\Figures\Airplanes\FighterPresentation();
        $presentation->setPresentation(array(
            array(0,0,0),
            array(0,0,0)
        ));

        assertThat($presentation->getWidth(), equalTo(3));
        assertThat($presentation->getHeight(), equalTo(2));
    }

}

<?php

namespace game\Figures\Airplanes;

use \game\Figures\Airplanes\Fighter;
use \game\Figures\Airplanes\Interceptor;

class AirplaneFactory
{

    public static function build($airplane)
    {
        $airplane = '\game\Figures\Airplanes\\' . $airplane;
        if (class_exists($airplane)) {
            $object = new $airplane();
            $outputter = new \game\Figures\AsciiOutputter();
            $outputter->setPresentation(new \game\Figures\Airplanes\FighterPresentation());
            $object->setOutputter($outputter);
            $object->setPropellant(new \game\Figures\Airplanes\AirplanePropellant($object));
            return $object;
        } else {
            throw new \Exception("Invalid airplane type given.");
        }
    }

}
<?php

namespace game\Figures\Airplanes;

use \game\Figures\Airplanes\Fighter;
use \game\Figures\Airplanes\Interceptor;

class AirplaneFactory
{

    public static function build($airplane)
    {
        if (class_exists('\game\Figures\Airplanes\\' . $airplane)) {
            $object = new $airplane();
            $object->setOutputter(new \game\Figures\Airplanes\AirplaneOutputter());
            return $object;
        } else {
            throw new \Exception("Invalid airplane type given.");
        }
    }

}
<?php

namespace game\Figures\Airplanes;

class InterceptorFactory
{

    public static function build($airplane)
    {
        $airplane = '\game\Figures\Airplanes\\' . $airplane;
        if (class_exists($airplane)) {
            $object = new $airplane();
            $outputter = new \game\Figures\AsciiOutputter();
            $outputter->setPresentation(new \game\Figures\Airplanes\InterceptorPresentation());
            $object->setOutputter($outputter);
            $object->setPropellant(new \game\Figures\Airplanes\InterceptorPropellant($object));
            return $object;
        } else {
            throw new \Exception("Invalid airplane type given.");
        }
    }

}

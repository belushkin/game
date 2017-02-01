<?php

namespace game\Figures\Airplanes;

class FighterFactory
{

    public static function build($airplane)
    {
        $airplane = '\game\Figures\Airplanes\\' . $airplane;
        if (class_exists($airplane)) {
            $object = new $airplane();
            $outputter = new \game\Figures\AsciiOutputter();
            $outputter->setPresentation(new \game\Figures\Airplanes\FighterPresentation());
            $object->setOutputter($outputter);
            $object->setPropellant(new \game\Figures\Airplanes\FighterPropellant($object));
            return $object;
        } else {
            throw new \Exception("Invalid airplane type given.");
        }
    }

}

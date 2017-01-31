<?php

namespace game\Figures\Backgrounds;

use \game\Figures\Backgrounds\Dots;

class BackgroundFactory
{

    public static function build($background)
    {
        $background = '\game\Figures\Backgrounds\\' . $background;
        if (class_exists($background)) {
            $object = new $background();
            $outputter = new \game\Figures\AsciiOutputter();
            $outputter->setPresentation(new \game\Figures\Backgrounds\DotsPresentation());
            $object->setOutputter($outputter);
            return $object;
        } else {
            throw new \Exception("Invalid background type given.");
        }
    }

}

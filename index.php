#!/usr/bin/php5
<?php

//https://www.youtube.com/watch?v=IwqQtUzDQok
//http://code.runnable.com/UoBqWfxBADcTAAA8/how-to-create-a-snake-game-in-php-using-ncurses-

error_reporting(E_ALL);
require 'vendor/autoload.php';

// CONTROLS: W/S/A/D
// Click on the screen first to be able to move
//
// We need to be able to refresh the screen between key presses
// Therefore, we need a non-blocking way to read key presses
// Ncurses does not provide that, so we use the standard input
// Unfortunately it is not possible to read left/right/up/down keys that way
putenv('TERM=xterm-color');

$game = new \game\App();
$game->setEngine(new game\Engine\Ncurses(array(
    \game\Figures\Airplanes\FighterFactory::build('Fighter'),
    \game\Figures\Airplanes\InterceptorFactory::build('Interceptor'),
    \game\Figures\Airplanes\InterceptorFactory::build('Interceptor'),
    \game\Figures\Airplanes\InterceptorFactory::build('Interceptor'),
    \game\Figures\Airplanes\InterceptorFactory::build('Interceptor'),
    \game\Figures\Airplanes\InterceptorFactory::build('Interceptor'),
    \game\Figures\Airplanes\InterceptorFactory::build('Interceptor'),
    //\game\Figures\Backgrounds\BackgroundFactory::build('Dots'),
)));
$game->run();

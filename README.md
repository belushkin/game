##Synopsis
This is presentation of the air fighting game written on PHP. It's just a begining of the game, I spent ~9 hours on researching and writing this code and another 2 hours on writing documentation and installing presentation on the digital ocean.
Here I present several classes with basic functionality. I implemented few Design Pattertns and SOLID principles. Business logic is decoupled from presentations. I tried to achieve ease replacement of the classes. 
#### Game
I was inspired by this game I found on [youtube](https://www.youtube.com/watch?v=IwqQtUzDQok). Fighter fights against Interceptors with small bullets, speed increases and Interceptors attack Fighter with new and new waves until Fighter can't deal with the speed. By shooting Interceptors Player gains scrore and when Fighter bumps into Interceptor or in hills the game is over and Player's score saved into DB. Later from the menu Player can view Players score table.
###### How To play
- w - move Fighter UP
- s - move Fighter DOWN
- SPACE - shoot the bullet

##Code Example
In order to use this game you need to install Ncurses library sinse this is command line application
```php
// Get window dimensions
ncurses_refresh();
ncurses_getmaxyx(STDSCR, $this->boardSize[1], $this->boardSize[0]);
```
Lunch the game
```php
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
```
##Motivation
I developed this game in order to demonstrate my skills in PHP programming, testing, code clarity, application architecture, correctness, security understanding, UX design.

##Installation
- PHP 5.5.9-1ubuntu4.20 (cli)
- Composer
- PEAR
- ncurses (pecl install ncurses)
- mockery/mockery
- phpunit/phpunit
- hamcrest/hamcrest-php

##Tests
Propellant of the plane, Ascii Outputter, Ncurses Engine, Fighter Presentation and other classes were covered by unit tests.
In order to achieve this I have used mockery and hamcrest
To lunch tests:
```
vendor/bin/phpunit -c tests/phpunit.xml tests/
```

##Contributors
@belushkin

##License
MIT License

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

class Game
{
    private $engine;

    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    public function run()
    {

    }

}




class Aircraft {

    private $window;
    private $hasEnded = false;
    private $movementX;
    private $movementY;

    // snake chunks in (x, y) format
    private $snake = array();

    private $boardSize = array();

    private $hills = array();
    private $hillHeight = 0;

    private function draw()
    {
        // Clear all previously drawn stuff
        ncurses_wclear($this->window);

        // Get window dimensions
        ncurses_wrefresh($this->window);
        ncurses_getmaxyx($this->window, $winy, $winx);

        // Draw border
        ncurses_wborder($this->window, 0, 0, 0, 0, 0, 0, 0, 0);

        // If game has been ended, draw game over screen
//        if($this->hasEnded)
//        {
//            $text = 'GAME OVER';
//
//            ncurses_wmove($this->window, $winy/2, ($winx - strlen($text))/2);
//            ncurses_waddstr($this->window, $text);
//
//            ncurses_wrefresh($this->window);
//
//            return;
//        }

        ncurses_wattron($this->window, NCURSES_A_REVERSE);
        // draw dots
        for ($i = 0; $i < $winy; $i++) {
            for ($j = 0; $j < $winx; $j++) {
                ncurses_wmove($this->window, $i, $j);
                ncurses_waddstr($this->window, '.');
            }
        }

        // Draw aircraft
//        foreach($this->snake as $s)
//        {
//            ncurses_wmove($this->window, $s[1], $s[0]);
//            ncurses_waddstr($this->window, '*');
//        }

        // Draw hills
        for ($i = $this->boardSize[1]; $i > $this->hillHeight; $i--) {
            for ($j = $this->movementX; $j < $this->movementX+10; $j++) {
                ncurses_wmove($this->window, $i, $j);
                ncurses_waddstr($this->window, '|');
            }
        }
        //$this->hills = array();
        ncurses_wattroff($this->window, NCURSES_A_REVERSE);

        // Draw food
//        if($this->food)
//        {
//            ncurses_wmove($this->window, $this->food[1], $this->food[0]);
//            ncurses_waddstr($this->window, '*');
//        }

        // Not all terminals can handle disabling the cursor
        // So we move the cursor to the corner to hide it
        ncurses_wmove($this->window, 0, 0);

        // Refresh
        ncurses_wrefresh($this->window);
    }

    private function restart()
    {
        // Create the initial snake, make it move right
        $this->snake = array(
            array(5, 5),
            array(6, 5)
        );

        $this->hillHeight = $this->boardSize[1] - 10;
        for($i = $this->boardSize[1]; $i > $this->hillHeight; $i--) {
            for ($j = 0; $j < 10; $j++) {//$this->boardSize[0]
                $this->hills[$i][] = $j ;
            }
        }
        //echo $this->boardSize[0];
//        print_r($this->hills[31]);
        //echo "ddd";
//        exit();

        $this->movementX = 0;
        $this->movementY = 0;
        $this->hasEnded = false;

        //$this->generateFood();
    }

    private function handleMovement()
    {
        $this->hills = array();
        $this->movementX++;
        $this->hillHeight = $this->boardSize[1] - 10;
        for($i = $this->boardSize[1]; $i > $this->hillHeight; $i--) {
            for ($j = $this->movementX; $j < $this->movementX+10; $j++) {//$this->boardSize[0]
                $this->hills[$i][] = $j ;
            }
        }


        // Get the last chunk of a snake
//        if(count($this->snake) > 0)
//            $head = $this->snake[ count($this->snake) - 1 ];
//
//        // Calculate where the new head will be
//        $newHead = array($head[0] + $this->movementX, $head[1] + $this->movementY);
//
//        // If a player hits a wall or the snake - game over
//        if($this->isBlocked($newHead))
//        {
//            $this->hasEnded = true;
//            return;
//        }
//
//        // If a food has been hit - snake grows
//        if($this->food == $newHead)
//        {
//            $this->generateFood();
//        }
//        else
//        {
//            // If not, remove the first element (oldest chunk) - snake does not grow
//            array_shift($this->snake);
//        }
//
//        // Add new head to the snake
//        $this->snake[] = $newHead;
    }

    public function run()
    {
        // Init ncurses, disable blinking cursor
        ncurses_init();
        ncurses_curs_set(0);

        // Create new full-screen window
        $this->window = ncurses_newwin(0, 0, 0, 0);

        if (ncurses_has_colors()) {
            ncurses_start_color();
            ncurses_init_pair(1, NCURSES_COLOR_CYAN, NCURSES_COLOR_WHITE);
            ncurses_wcolor_set($this->window, 1);
        }

        // Get its dimensions
        ncurses_refresh();
        ncurses_getmaxyx(STDSCR, $this->boardSize[1], $this->boardSize[0]);

        // Start a new game
        $this->restart();

        while(true)
        {
            //$this->handleKeys();

            //if(!$this->hasEnded)
                $this->handleMovement();

            $this->draw();

            // Delay for 150ms
            usleep(150*1000);
        }

        ncurses_end();
    }

}

$aircraft = new Aircraft();
$aircraft->run();


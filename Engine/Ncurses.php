<?php

namespace game\Engine;

class Ncurses implements EngineInterface
{

    private $window;
    private $boardSize = array();
    private $figures = array();
    private $hasEnded = false;

    public function __construct(Array $figures = array())
    {
        foreach ($figures as $figure) {
            if ($figure instanceof \game\Figures\FigureInterface) {
                $this->figures[] = $figure;
            }
        }
    }

    private function restart()
    {
        foreach ($this->figures as $figure) {
            $figure->getPropellant()->setWindowHeight($this->boardSize[1]);
            $figure->getPropellant()->setWindowWidth($this->boardSize[0]);
            $figure->init();
        }
        $this->hasEnded = false;
    }

    public function run()
    {
        // Init ncurses, disable blinking cursor
        ncurses_init();
        ncurses_curs_set(0);

        // Create new full-screen window
        $this->window = ncurses_newwin(0, 0, 0, 0);

        // Set basic color schema
        if (ncurses_has_colors()) {
            $this->setColorSchema();
        }

        // Get window dimensions
        ncurses_refresh();
        ncurses_getmaxyx(STDSCR, $this->boardSize[1], $this->boardSize[0]);

        // Start a new game
        $this->restart();

        while(true)
        {
            $this->handleKeys();
            if (!$this->hasEnded) {
                $this->handleMovement();
            }
            $this->draw();

            // Delay for 150ms
            usleep(150*1000);
        }

        ncurses_end();
    }

    public function draw()
    {
        // Clear all previously drawn stuff
        ncurses_wclear($this->window);

        // Get window dimensions
        ncurses_wrefresh($this->window);
        ncurses_getmaxyx($this->window, $winy, $winx);

        // Draw border
        ncurses_wborder($this->window, 0, 0, 0, 0, 0, 0, 0, 0);

        if (!$this->hasEnded) {
            foreach ($this->figures as $figure) {
                ncurses_wattron($this->window, NCURSES_A_REVERSE);
                $figure->getOutputter()->draw($this);
                ncurses_wattroff($this->window, NCURSES_A_REVERSE);
            }
        }

        // Not all terminals can handle disabling the cursor
        // So we move the cursor to the corner to hide it
        ncurses_wmove($this->window, 0, 0);

        // Refresh
        ncurses_wrefresh($this->window);
    }

    public function handleMovement()
    {
        foreach ($this->figures as $key => $figure) {
            $figure->getPropellant()->handleMovement();
            if ($figure->getPropellant()->hasEnded()) {
                $this->hasEnded = true;
                $this->restart();
                return true;
            }
        }
    }

    public function handleKeys()
    {
        // Since ncurses_getch blocks the execution until the user presses any key
        // And we need to refresh the screen in between key presses
        // We need to use some other asynchronous method
        $file = fopen('php://stdin', 'r');
        stream_set_blocking($file, false);
        $key = fread($file, 1);

        if ($this->hasEnded) {
            $this->restart();
            return true;
        }

        foreach ($this->figures as $figure) {
            $figure->getPropellant()->handleKeys($key);
        }
    }

    public function echoString($y, $x, $string = '')
    {
        ncurses_wmove($this->window, $y, $x);
        ncurses_waddstr($this->window, $string);
    }

    public function addFigure(\game\Figures\FigureInterface $figure)
    {
        $this->figures[] = $figure;
    }

    public function getFigures()
    {
        return $this->figures;
    }

    private function setColorSchema()
    {
        ncurses_start_color();
        ncurses_init_pair(1, NCURSES_COLOR_CYAN, NCURSES_COLOR_WHITE);
        ncurses_wcolor_set($this->window, 1);
    }

}

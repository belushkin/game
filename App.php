<?php

namespace game;

class App
{
    private $engine;

    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    public function run()
    {
        $this->engine->run();
    }

}
<?php

namespace game\Figures;

interface PropellantInterface
{

    public function handleKeys($key);
    public function handleMovement();
    public function setWindowHeight($height);
    public function setWindowWidth($width);

}

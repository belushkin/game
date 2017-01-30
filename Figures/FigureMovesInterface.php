<?php

namespace game\Figures;

interface FigureMovesInterface
{

    public function up();
    public function down();
    public function left();
    public function right();

}

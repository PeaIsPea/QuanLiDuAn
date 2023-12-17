<?php

namespace App\View\Components\Game;

use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $game;
    public function __construct($game)
    {
        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game.detail');
    }
}

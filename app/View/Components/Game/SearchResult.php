<?php

namespace App\View\Components\Game;

use Illuminate\View\Component;

class SearchResult extends Component
{
    public $gameList;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($gameList)
    {
        $this->gameList = $gameList;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game.search-result');
    }
}

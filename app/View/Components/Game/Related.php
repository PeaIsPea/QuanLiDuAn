<?php

namespace App\View\Components\game;

use Illuminate\View\Component;

class Related extends Component
{
    public $related;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($related)
    {
        $this->related=$related;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game.related');
    }
}

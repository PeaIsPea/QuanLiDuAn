<?php

namespace App\View\Components;

use App\Models\Genre;
use Illuminate\View\Component;

class genreOption extends Component
{
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $option = Genre::all();
        return view('components.genre-option', ['genres' => $option]);
    }
}

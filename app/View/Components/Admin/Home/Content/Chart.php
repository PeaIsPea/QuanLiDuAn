<?php

namespace App\View\Components\Admin\Home\Content;

use Illuminate\View\Component;

class Chart extends Component
{
    public $chart;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chart)
    {
        $this->chart = $chart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.home.content.chart');
    }
}

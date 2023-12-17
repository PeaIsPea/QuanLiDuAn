<?php

namespace App\View\Components\Admin\Home;

use Illuminate\View\Component;

class AdminCard extends Component
{
    public $data;
    public $title;
    public $optionalData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data, $title, $optionalData = null)
    {
        $this->data = $data;
        $this->title = $title;
        $this->optionalData = $optionalData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.home.admin-card');
    }
}

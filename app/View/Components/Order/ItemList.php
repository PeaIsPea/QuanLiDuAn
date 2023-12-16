<?php

namespace App\View\Components\Order;

use Illuminate\View\Component;

class ItemList extends Component
{
    public $cartItem;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cartItem)
    {
        $this->cartItem = $cartItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order.item-list');
    }
}

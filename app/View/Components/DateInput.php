<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class DateInput extends Component
{
    public $value;

    /**
     * DateInput constructor.
     * @param $value
     */
    public function __construct($value=null)
    {
        $this->value= $value??Carbon::today()->format("d-m-Y");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.date-input');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input_field extends Component
{
    public $name;
    public $type;
    public $label;
    public $placeholder;
    public $divclass;
    public $value;


    /**
     * Create a new component instance.
     */
    public function __construct($name, $type, $label,$placeholder, $value, $divclass='col-md-6')
    {
        $this->name = $name;
        $this->type = $type;
        $label->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->divclass = $divclass;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input_field');
    }
}

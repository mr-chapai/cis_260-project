<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea_field extends Component
{

    public $name;
    public $label;
    public $row;
    public $divclass;
    public $value;


    /**
     * Create a new component instance.
     */
    public function __construct($label,$name,  $row=3,$value='hi', $divclass='col-md-6')
    {
      $this->name = $name;
      $this->label = $label;
      $this->divclass = $divclass;
      $this->value = $value;
      $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea_field');
    }
}

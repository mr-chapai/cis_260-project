<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio_field extends Component
{
    public $name;
    public $label;
    public $options;
    public $value;
    public $checked;
    public $groupLabe;

    public function __construct($name, $checked, $value, $options = [],$groupLabe)
    {
        $this->name = $name;
        $this->checked = $checked;
        $this->value = $value;
        $this->options = $options;
        $this->groupLabel = $groupLabe;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio_field');
    }
}

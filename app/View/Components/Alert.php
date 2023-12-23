<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;

    protected $types = [
        "success",
        "danger",
        "warning",
        "info"
    ];

    /**
     * Create a new component instance.
     */
    public function __construct($type = "info")
    {
        $this->type = $type;
    }

    public function validType()
    {
        return in_array($this->type, $this->types) ? $this->type : 'info';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    public $type;

    public $dismissible;

    protected $types = [
        "success",
        "danger",
        "warning",
        "info"
    ];

    /**
     * Create a new component instance.
     */
    public function __construct($type = "info", $dismissible = false)
    {
        $this->type = $type;
        $this->dismissible = $dismissible;
    }

    public function validType()
    {
        return in_array($this->type, $this->types) ? $this->type : 'info';
    }

    public function link($text, $target = '#')
    {
        return new HtmlString("<a href=\"{$target}\" class=\"alert-link\">{$text}</a>");
    }

    public function icon($url = null)
    {
        $icon = $url ?? asset("icons/icon-{$this->type}.svg");
        return new HtmlString("<img class='me-2' src='{$icon}' />");
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}

<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DictionaryCard extends Component
{
    public string $title;
    public string $path;
    public function __construct(string $title,string $path)
    {
        $this->title = $title;
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.u-i.dictionary-card');
    }
}

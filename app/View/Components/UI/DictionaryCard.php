<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DictionaryCard extends Component
{
    public string $title;
    public string $path;
    public string $color;
    public int $width;
    public int $height;
    public function __construct(string $title,string $path,string $color,int $height,int $width)
    {
        $this->title = $title;
        $this->path = $path;
        $this->color = $color;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.u-i.dictionary-card');
    }
}

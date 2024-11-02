<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Lesson extends Component
{
    /**
     * Create a new component instance.
     */

    public string $titleLesson;
    public bool $statusLesson;
    public string $path;
    public function __construct(string $titleLesson,bool $statusLesson,string $path)
    {
        $this->titleLesson = $titleLesson;
        $this->statusLesson = $statusLesson;
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.u-i.lesson');
    }
}

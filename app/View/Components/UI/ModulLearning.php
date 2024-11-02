<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModulLearning extends Component
{
    public string $titleCourse ;
    public string $deskripsiCourse ;
    public function __construct(string $titleCourse, string $deskripsiCourse)
    {
        $this->titleCourse = $titleCourse;
        $this->deskripsiCourse = $deskripsiCourse;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.u-i.modul-learning');
    }
}

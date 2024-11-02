<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressBar extends Component
{
    /**
     * Create a new component instance.
     */
    public int $progress;
    public string $courseModul;
    public string $courseTitle;
    public function __construct(int $progress, string $courseModul, string $courseTitle)
    {
        $this->progress = $progress;
        $this->courseModul = $courseModul;
        $this->courseTitle = $courseTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.u-i.progress-bar');
    }
}

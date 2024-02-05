<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class html extends Component
{

    public string $lang;
    public string|null $head;
    public string|null $title;

    public function __construct(
        string $lang = 'ru',
        string|null $head = null,
        string|null $title = null,

    ) {
        $this->lang = $lang;
        $this->head = $head;
        $this->title = $title ? : env('APP_NAME', 'Megano');
    }

    public function render(): View|Closure|string
    {
        return view('components.html');
    }
}

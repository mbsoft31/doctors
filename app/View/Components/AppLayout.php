<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{

    public function render()
    {
        return view('layouts.app');
    }
}

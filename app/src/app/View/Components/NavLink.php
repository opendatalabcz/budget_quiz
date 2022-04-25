<?php

namespace App\View\Components;

use Illuminate\Routing\Route;
use Illuminate\View\Component;

class NavLink extends Component
{

    public string $routeName;
    public bool $isActive;

    /**
     * Create a new component instance.
     *
     * @param Route $route
     * @param string $routeName
     * @param bool $checkSubNames
     */
    public function __construct(Route $route, string $routeName, bool $checkSubNames = true)
    {
        $this->routeName = $routeName;

        if ($checkSubNames) {
            $end = strrpos($routeName, '.');

            if ($end !== false) {
                $routeName = substr($routeName, 0, $end);
            }

            $routeName .= '*';
        }

        $this->isActive = $route->named($routeName);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-link');
    }
}

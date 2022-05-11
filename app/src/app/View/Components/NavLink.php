<?php

namespace App\View\Components;

use Illuminate\Routing\Route;
use Illuminate\View\Component;

/**
 * Represents navigation link
 */
class NavLink extends Component
{
    public string $routeName;
    public bool $isActive;

    /**
     * Create a new component instance.
     *
     * @param Route $route
     * @param string $routeName the name of the route
     * @param string $activeRoutes use 'subNames' when you want to mark subpages of this route also as active for this item
     */
    public function __construct(Route $route, string $routeName, string $activeRoutes = "subNames")
    {
        $this->routeName = $routeName;

        if ($activeRoutes === "subNames") {
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

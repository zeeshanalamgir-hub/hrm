<?php

/*
|--------------------------------------------------------------------------
| Sidebar Navigation
|--------------------------------------------------------------------------
|
| Each section renders a label followed by its items. An item may define a
| "route" (named route) to link to, an "active" route pattern (defaults to
| the route), an optional "badge", and "children" for a collapsible submenu. Items without a route are rendered as
| placeholders until their module is built.
|
*/

return [
    [
        'label' => 'Workspace',
        'items' => [
            ['title' => 'Dashboard', 'icon' => 'layout-dashboard', 'route' => 'dashboard'],
        ],
    ],
    [
        'label' => 'System',
        'items' => [
            ['title' => 'Settings', 'icon' => 'settings-2', 'route' => 'settings.edit', 'active' => 'settings.*'],
        ],
    ],
];

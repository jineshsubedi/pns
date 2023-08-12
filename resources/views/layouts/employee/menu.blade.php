@php
    $menu = [
        [
            'url' => route("employee.dashboard"),
            'label' => 'Dashboard',
            'icon' => 'nav-icon fas fa-th',
            'permission' => '',
            'path' => request()->is('employee/dashboard*'),
            'links' => [],
            'children' => [],
        ],
        [
            'url' => '#',
            'label' => 'Setting',
            'icon' => 'nav-icon fas fa-cogs',
            'permission' => '',
            'path' => '',
            'links' => ['settings', 'profile', 'users', 'roles'],
            'children' => [
                // [
                //     'url' => route("employee.profile.edit"),
                //     'label' => 'Profile',
                //     'icon' => 'nav-icon fas fa-users',
                //     'permission' => '',
                //     'path' => request()->is('employee/profile*'),
                //     'links' => [],
                //     'children' => [],
                // ],
            ],
        ],
    ];


    function generateMenu($items)
    {
        $html = '';
        foreach ($items as $item) {
            $hasChildren = !empty($item['children']);
            // $isActive = request()->url() == $item['url'] ? 'active' : '';
            $isActive = $item['path'] ? 'active' : '';
            $isMenuOpen = in_array(request()->segment(2), $item['links']) && $hasChildren ? 'menu-open' : '';

                $html .= '
                <li class="nav-item '.$isMenuOpen.'">
                <a href="'.$item["url"].'" class="nav-link '.$isActive.'">
                <i class="'.$item["icon"].'"></i>
                <p>'.$item["label"];
                if($hasChildren)
                {
                    $html .= '<i class="right fas fa-angle-left"></i>';
                }
                $html .= '
                </p>
                </a>';
                if($hasChildren)
                {
                    $html .= '
                    <ul class="nav nav-treeview">
                        ';
                    $html .= generateMenu($item["children"]);
                    $html .= '</ul>';
                }
                $html .= '</li>';

        }
        return $html;
    }
@endphp
{!! generateMenu($menu) !!}

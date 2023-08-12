@php
    $menu = [
        [
            'url' => route("admin.dashboard"),
            'label' => 'Dashboard',
            'icon' => 'nav-icon fas fa-th',
            'permission' => '',
            'path' => request()->is('admin/dashboard*'),
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
                [
                    'url' => route("admin.settings.index"),
                    'label' => 'Configuration',
                    'icon' => 'nav-icon fas fa-wrench',
                    'permission' => 'read-setting',
                    'path' => request()->is('admin/settings*'),
                    'links' => [],
                    'children' => [],
                ],
                [
                    'url' => route("admin.profile.edit"),
                    'label' => 'Profile',
                    'icon' => 'nav-icon fas fa-users',
                    'permission' => '',
                    'path' => request()->is('admin/profile*'),
                    'links' => [],
                    'children' => [],
                ],
                [
                    'url' => route("admin.users.index"),
                    'label' => 'User Management',
                    'icon' => 'nav-icon fas fa-user',
                    'permission' => 'read-user',
                    'path' => request()->is('admin/users*'),
                    'links' => [],
                    'children' => [],
                ],
                [
                    'url' => route("admin.roles.index"),
                    'label' => 'Role Management',
                    'icon' => 'nav-icon fas fa-user-tag',
                    'permission' => 'read-role',
                    'path' => request()->is('admin/roles*'),
                    'links' => [],
                    'children' => [],
                ],
            ],
        ],
        [
            'url' => route("admin.employers.index"),
            'label' => 'Employers',
            'icon' => 'nav-icon fas fa-briefcase',
            'permission' => 'read-employer',
            'path' => request()->is('admin/employers*'),
            'links' => [],
            'children' => [],
        ],
        [
            'url' => route("admin.employees.index"),
            'label' => 'Employees',
            'icon' => 'nav-icon fas fa-users',
            'permission' => 'read-employee',
            'path' => request()->is('admin/employees*'),
            'links' => [],
            'children' => [],
        ],
    ];

    // $permissions = Cache::remember('user_permissions_' . auth()->id(), 60 * 60, function() {
    //     $permissions = collect();

    //     foreach (auth()->user()->roles as $role) {
    //         $permissions = $permissions->merge($role->permissions->pluck('name')->toArray());
    //     }

    //     return $permissions;
    // });
    $permissions = collect();

    foreach (auth()->user()->roles as $role) {
        $permissions = $permissions->merge($role->permissions->pluck('name')->toArray());
    }

    function generateMenu($items, $permissions)
    {
        $html = '';
        foreach ($items as $item) {
            $hasChildren = !empty($item['children']);
            // $isActive = request()->url() == $item['url'] ? 'active' : '';
            $isActive = $item['path'] ? 'active' : '';
            $isMenuOpen = in_array(request()->segment(2), $item['links']) && $hasChildren ? 'menu-open' : '';
            if($permissions->contains($item['permission']) || $item['permission'] == '')
            {
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
                    $html .= generateMenu($item["children"], $permissions);
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }

        }
        return $html;
    }
@endphp
{!! generateMenu($menu, $permissions) !!}

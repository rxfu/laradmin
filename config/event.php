<?php

return [
    'listeners' => [
        Illuminate\Auth\Events\Login::class => [
            App\Listeners\LogSuccessfulLogin::class,
        ],
        Illuminate\Auth\Events\Logout::class => [
            App\Listeners\LogSuccessfulLogout::class,
        ],
        Illuminate\Auth\Events\Lockout::class => [
            App\Listeners\LogLockout::class,
        ],
    ],

    'observers' => [
        App\Models\User::class,
        App\Models\Role::class,
        App\Models\Permission::class,
        App\Models\Group::class,
        App\Models\Menu::class,
        App\Models\Menuitem::class,
        App\Models\Setting::class,
        // model_here
    ],
];

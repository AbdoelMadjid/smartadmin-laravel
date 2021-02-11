<?php

namespace Vreyz\Admin\Controllers;

use Vreyz\Admin\Admin;
use Illuminate\Support\Arr;

class Dashboard
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function title()
    {
        return view('admin::dashboard.title');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function environment()
    {
        $envs = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        return view('admin::dashboard.environment', compact('envs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function extensions()
    {
        if (Admin::Themes('adminlte')) {
        $extensions = [
            'helpers' => [
                'name' => 'smartadmin-laravel-ext/helpers',
                'link' => 'https://github.com/smartadmin-laravel-extensions/helpers',
                'icon' => 'gears',
            ],
            'log-viewer' => [
                'name' => 'smartadmin-laravel-ext/log-viewer',
                'link' => 'https://github.com/smartadmin-laravel-extensions/log-viewer',
                'icon' => 'database',
            ],
            'backup' => [
                'name' => 'smartadmin-laravel-ext/backup',
                'link' => 'https://github.com/smartadmin-laravel-extensions/backup',
                'icon' => 'copy',
            ],
            'config' => [
                'name' => 'smartadmin-laravel-ext/config',
                'link' => 'https://github.com/smartadmin-laravel-extensions/config',
                'icon' => 'toggle-on',
            ],
            'api-tester' => [
                'name' => 'smartadmin-laravel-ext/api-tester',
                'link' => 'https://github.com/smartadmin-laravel-extensions/api-tester',
                'icon' => 'sliders',
            ],
            'media-manager' => [
                'name' => 'smartadmin-laravel-ext/media-manager',
                'link' => 'https://github.com/smartadmin-laravel-extensions/media-manager',
                'icon' => 'file',
            ],
            'scheduling' => [
                'name' => 'smartadmin-laravel-ext/scheduling',
                'link' => 'https://github.com/smartadmin-laravel-extensions/scheduling',
                'icon' => 'clock-o',
            ],
            'reporter' => [
                'name' => 'smartadmin-laravel-ext/reporter',
                'link' => 'https://github.com/smartadmin-laravel-extensions/reporter',
                'icon' => 'bug',
            ],
            'redis-manager' => [
                'name' => 'smartadmin-laravel-ext/redis-manager',
                'link' => 'https://github.com/smartadmin-laravel-extensions/redis-manager',
                'icon' => 'flask',
            ],
        ]; } else {
            $extensions = [
                'helpers' => [
                    'name' => 'vreyz/helpers',
                    'link' => 'https://github.com/vreyz/smartadmin-helpers',
                    'icon' => 'ambulance',
                ],
                'log-viewer' => [
                    'name' => 'vreyz/multilanguage',
                    'link' => 'https://github.com/vreyz/smartadmin-language',
                    'icon' => 'flag',
                ],
                'backup' => [
                    'name' => 'vreyz/datatables',
                    'link' => 'https://github.com/vreyz/smartadmin-datatables',
                    'icon' => 'table',
                ],
                'config' => [
                    'name' => 'smartadmin-config',
                    'link' => 'https://github.com/vreyz/smartadmin-config',
                    'icon' => 'toggle-on',
                ],
                'api-tester' => [
                    'name' => 'smartadmin-api-tester',
                    'link' => 'https://github.com/vreyz/smartadmin-api-tester',
                    'icon' => 'cloudversify',
                ],
                'media-manager' => [
                    'name' => 'smartadmin-media-manager',
                    'link' => 'https://github.com/vreyz/smartadmin-media-manager',
                    'icon' => 'file',
                ],
                'scheduling' => [
                    'name' => 'smartadmin-scheduling',
                    'link' => 'https://github.com/vreyz/smartadmin-scheduling',
                    'icon' => 'clock',
                ],
                'reporter' => [
                    'name' => 'smartadmin-reporter',
                    'link' => 'https://github.com/vreyz/smartadmin-reporter',
                    'icon' => 'bug',
                ],
                'redis-manager' => [
                    'name' => 'smartadmin-laravel-ext/redis-manager',
                    'link' => 'https://github.com/vreyz/smartadmin-redis-manager',
                    'icon' => 'flask',
                ],
            ];
        }

        foreach ($extensions as &$extension) {
            $name = explode('/', $extension['name']);
            $extension['installed'] = array_key_exists(end($name), Admin::$extensions);
            $name == 'multilanguage' || $name == 'datatables' ? $extension['installed'] = true : $extension['installed'] = false;
        }
        return view('admin::dashboard.extensions', compact('extensions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function dependencies()
    {
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];

        return Admin::component('admin::dashboard.dependencies', compact('dependencies'));
    }
}

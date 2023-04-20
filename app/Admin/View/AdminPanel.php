<?php

namespace App\Admin\View;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AdminPanel
{
    public $profile;

    /**
     * Основное (левое) меню
     *
     * @var Collection
     */
    public Collection $menu;

    /**
     * Информационные сообщения
     *
     * @var Collection
     */
    public Collection $toasts;

    public string $prefix = '/admin';

    protected \Illuminate\Contracts\Auth\Authenticatable $user;

    public function __construct()
    {
        $this->prefix = config('admin.prefix');

        $this->user = Auth::user();

//        $this->profile = $this->profile();
        $this->menu = $this->mainMenu();
    }

    private function profile()
    {
//        return auth()->user()->loadMissing(['roles']);
    }

    private function mainMenu(): Collection
    {
        $main = [
            ['icon' => 'web', 'text' => 'Страницы', 'url' => 'pages'],

            ['icon' => 'fact_check', 'text' => 'Справочники', 'url' => 'dictionaries'],

            ['icon' => 'rule_folder', 'text' => 'Формы', 'url' => 'forms'],

        ];


        return collect(
            [
                'main' => Arr::whereNotNull($main),

            ]
        );
    }

    public function addToast()
    {
    }
}

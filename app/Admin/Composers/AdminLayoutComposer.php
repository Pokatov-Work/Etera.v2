<?php

namespace App\Admin\Composers;

use App\Admin\View\AdminPanel;
use Illuminate\View\View;

class AdminLayoutComposer
{
    public AdminPanel $adminPanel;

    /**
     * Создать нового компоновщика admin layout.
     *
     * @return void
     */
    public function __construct(AdminPanel $adminPanel)
    {
        // Зависимости автоматически внедрятся контейнером служб ...
        $this->adminPanel = $adminPanel;
    }

    /**
     * Привязать данные к шаблону.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $view->with('profile', $this->adminPanel->profile);
        $view->with('mainMenu', $this->adminPanel->menu);
        $view->with('adminLayout', $this->adminPanel);
    }
}

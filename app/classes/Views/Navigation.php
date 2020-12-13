<?php


namespace App\Views;

use App\App;
use Core\View;

class Navigation extends View
{

    public function __construct()
    {
        parent::__construct($this->generate());
    }

    /**
     * All webpage navigation
     *
     * @return array
     */
    public function generate()
    {
        $nav = ['HOME' => App::$router::getUrl('index')];

        if (App::$session->getUser()) {
            if (App::$session->getUser()['email'] === 'admin@admin.lt') {
                return $nav + [
                        'ADD' => App::$router::getUrl('add'),
                        'DISCOUNTS' => App::$router::getUrl('admin_discounts'),
                        'ORDERS' => App::$router::getUrl('admin_orders'),
                        'USERS' => App::$router::getUrl('admin_users'),
                        'LOGOUT' => App::$router::getUrl('logout'),
                    ];
            } else {
                return $nav + [
                        'ORDERS' => App::$router::getUrl('user_orders'),
                        'LOGOUT' => App::$router::getUrl('logout'),
                    ];
            }
        } else {
            return $nav + [
                    'REGISTER' => App::$router::getUrl('register'),
                    'LOGIN' => App::$router::getUrl('login'),
                ];
        }
    }

    public function render($template_path = ROOT . '/app/templates/nav.php')
    {
        return parent::render($template_path); // TODO: Change the autogenerated stub
    }

}

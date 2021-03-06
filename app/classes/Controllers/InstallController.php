<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\App;
use Core\FileDB;

class InstallController
{
    /**
     * Install data
     */
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');

        App::$db->insertRow('users', [
            'email' => 'test@test.lt',
            'password' => 'as',
            'name'=> 'test',
            'role' => 'user'
        ]);

        App::$db->insertRow('users', [
            'email' => 'admin@admin.lt',
            'password' => 'as',
            'name' => 'Admin',
            'role' => 'admin'
        ]);

        App::$db->createTable('orders');
        App::$db->createTable('pizzas');
        App::$db->createTable('discounts');
    }
}
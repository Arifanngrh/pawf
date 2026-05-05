<?php

namespace App\Controllers;

class AuthController extends \Myth\Auth\Controllers\AuthController
{
    public function login()
    {
        if (! session()->has('redirect_url')) {
            session()->set('redirect_url', site_url('admin/post'));
        }

        return parent::login();
    }
}
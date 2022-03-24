<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home || Car Wash @ qadrlabs.com'
        ];

        return view('home', $data);
    }

}
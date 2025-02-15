<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $name = 'Dodi';
        return view('blog', ['name' => $name]);
    }

    public function about()
    {
        $name = 'Dodi';
        $gender = 'Male';
        $dateOfBirth = '1-1-1989';
        $address = 'Jalan Salak 1 No. 108';
        return view('about', 
        [
            'name' => $name, 
            'gender' => $gender, 
            'dateOfBirth' => $dateOfBirth, 
            'address' => $address
            ] 
        );
    }
}

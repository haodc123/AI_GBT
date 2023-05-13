<?php

namespace App\Http\Controllers;

use App\Blogs;
use App\BlogCats;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request) {
        $blogs = new Blogs();
        $someblogs = $blogs->getSomeBlogs(3);

        return view('home.home', [
            'someblogs' => $someblogs
        ]);
    }

}

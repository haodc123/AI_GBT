<?php

namespace App\Http\Controllers;

use App\Blogs;
use App\BlogCats;
use App\Subjects;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request) {
        // $blogs = new Blogs();
        // $someblogs = $blogs->getSomeBlogs(3);
        // return view('home.home', [
        //     'someblogs' => $someblogs
        // ]);
        $sub = new Subjects();
        $list_all_sub = $sub->getAllSubject();
        return view('home.direction', [
            'list_all_sub' => $list_all_sub
        ]);
    }

    public function home(Request $request) {
        $blogs = new Blogs();
        $someblogs = $blogs->getSomeBlogs(3);
        return view('home.home', [
            'someblogs' => $someblogs
        ]);
    }

}

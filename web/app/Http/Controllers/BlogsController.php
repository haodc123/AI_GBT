<?php

namespace App\Http\Controllers;

use App\Blogs;

class BlogsController extends Controller
{

    private $blog;

    private $blogs;

    public function index() {

        $this->blogs = new Blogs();
        $bloglist = $this->blogs->getAllBlogs();

        return view('blogs.blogs', [
            'bloglist' => $bloglist
        ]);
    }

    public function show($title) {

        $this->blogs = new Blogs();
        $blog = $this->blogs->getBlogWithTitle($title);
        $bloglist = $this->blogs->getAllBlogs(6);

        return view('blogs.detail', [
            'blog' => $blog,
            'bloglist' => $bloglist
        ]);
    }

}

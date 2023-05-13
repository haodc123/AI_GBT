<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use SoftDeletes;

    protected $table = 'blogs';

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllBlogs($n=6) {
        return self::take($n)->get();
    }

    public function getAllBlogsPagination() {
        return self::paginate(\Config::get('constants.general.per_page'));
    }

    public function getSomeBlogs($n) {
        return self::orderBy('id', 'desc')->take($n)->get();
    }

    public function getBlogWithTitle($title) {
        return self::where('blog_title_slug', $title)->first();
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }

    public function save_blog() {
        return $this->save();
    }

    public function update_blog() {
        return self::where('id', $this->id)->update([
            'blog_title' => $this->blog_title,
            'blog_content' => $this->blog_content,
            'blog_cat' => $this->blog_cat,
            'blog_thumb' => $this->blog_thumb,
            'blog_status' => $this->blog_status
        ]);
    }

    public function delete_blog() {
        return self::destroy($this->id);
    }
}

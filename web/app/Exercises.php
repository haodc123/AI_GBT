<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercises extends Model
{
    use SoftDeletes;

    protected $table = 'exercises';

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllExc($n=20) {
        return self::take($n)->get();
    }

    public function getAllExcPagination() {
        return self::paginate(\Config::get('constants.general.per_page'));
    }

    public function getSomeExc($n) {
        return self::orderBy('id', 'desc')->take($n)->get();
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }

    public function save_exc() {
        return $this->save();
    }

    public function update_exc() {
        return self::where('id', $this->id)->update([
            'exc_title' => $this->exc_title,
            'exc_content' => $this->exc_content,
            'exc_cat' => $this->exc_cat,
            'exc_thumb' => $this->exc_thumb,
            'exc_status' => $this->exc_status
        ]);
    }

    public function delete_exc() {
        return self::destroy($this->id);
    }
}

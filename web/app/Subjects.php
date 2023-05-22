<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{

    protected $table = 'subject_part';
    public $timestamps = false;

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllSubjects() {
        return self::all();
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }

    public function getSubjectWithId($id) {
        return self::where('id', $id)->first();
    }
}

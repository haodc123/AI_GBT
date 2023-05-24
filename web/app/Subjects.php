<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use SoftDeletes;

    protected $table = 'subject_part';
    public $timestamps = false;
    const PER_PAGE_LESS = 10;
    const PER_PAGE_MIDDLE = 20;

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllSubject() {
        return self::where('type', 1)
                ->paginate(Subjects::PER_PAGE_MIDDLE);
    }
    public function getAllSubjectAndPart() {
        return self::all();
    }
    public function getPartFromSubject($grade, $subject) {
        return self::where('type', 2)
                ->where('subject', $subject)
                ->where(function ($query) use ($grade) {
                    $query->where('grade', '=', $grade);
                    $query->orWhereNull('grade');
                })
                ->orderBy('id', 'DESC')
                ->paginate(Subjects::PER_PAGE_LESS);
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }

    public function getSubjectFromId($id) {
        return self::where('id', $id)->first();
    }
    public function getSubjectFromSlug($slug) {
        return self::where('title_slug', $slug)->first();
    }
}

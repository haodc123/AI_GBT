<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use SoftDeletes;

    protected $table = 'items';

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllItems() {
        return self::all();
    }

    public function getAllItemsPagination() {
        return self::paginate(\Config::get('constants.general.per_page'));
    }

    public function getSomeItems($n) {
        return self::orderBy('item_date', 'desc')->take($n)->get();
    }

    public function getItemsByType($morning, $lunch, $dinner, $snack, $last = 4) {
        $types = array();
        if ($morning == 1) array_push($types, 1);
        if ($lunch == 1) array_push($types, 2);
        if ($dinner == 1) array_push($types, 3);
        if ($snack == 1) array_push($types, 4);

        return self::whereIn('item_type', $types)
                    ->orderBy('item_date', 'DESC')
                    ->take($last)->get();
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }
}

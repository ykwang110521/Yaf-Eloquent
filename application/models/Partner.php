<?php
namespace App\Models;

class Partner extends EloquentModel {
    protected $table = 't_partner';

    public function category() {
        return $this->hasOne('App\Models\Category','cate_id','cate_id');
    }
}
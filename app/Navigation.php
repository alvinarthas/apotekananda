<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table ='navigation_tbl';

    public function subnav()
    {
      return $this->hasMany(Subnav::class);
    }
    public static function navs()
    {
      return Navigation::orderBy('nav','asc')->get();
    }

}

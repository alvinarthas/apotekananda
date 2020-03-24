<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subnav extends Model
{
  protected $table ='subnavigation_tbl';

  public static function navsubs($id)
  {
    return SubNav::where('nav_id', '=', $id)->orderBy('subNav','asc')->get();
  }

  public function navigation()
  {
    return $this->belongsTo(Navigation::class);
  }
}

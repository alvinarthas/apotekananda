<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mapping extends Model
{
    protected $table ='mapping_tbl';
    protected $guarded = ['id'];

    public static function navmapping($id)
    {
      return DB::select("SELECT DISTINCT navigation_tbl.nav_id,nav,nav_icon FROM mapping_tbl
INNER JOIN roles ON mapping_tbl.role_id=roles.id
INNER JOIN subnavigation_tbl ON mapping_tbl.subnav_id=subnavigation_tbl.subnav_id
INNER JOIN navigation_tbl ON subnavigation_tbl.nav_id=navigation_tbl.nav_id
WHERE role_id='$id' ORDER BY nav asc");
    }
    public static function subnavmapping($id,$id2)
    {
      return DB::select("SELECT DISTINCT subnavigation_tbl.subnav_id,subNav,pages FROM mapping_tbl
INNER JOIN subnavigation_tbl ON subnavigation_tbl.subnav_id = mapping_tbl.subnav_id
WHERE nav_id='$id' and mapping_tbl.role_id=$id2 ORDER BY subNav asc");
    }
}

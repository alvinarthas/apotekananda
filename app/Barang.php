<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
  protected $table ='barang_tbl';
  protected $guarded = ['id'];

  public static function barangs($id)
  {
    return DB::select("SELECT * FROM barang_tbl where kode_barang='$id'");
  }
}

<?php
use App\Navigation;
use App\Subnav;
?>
@extends('layouts.master')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Role Name:  <strong>{{$role->name}}</strong></h3><br>
  </div>
</div>
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Current Role Mapping</h3><br>
                </div><!-- /.box-header -->
                <form action="/mapping/{{$role->id}}" method="POST">
                    {{ csrf_field()}}
                    {{ method_field('DELETE') }}
                <div class="box-body">
                  <table id="current_mapping" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Modul</th>
                        <th>Nama Sub Modul</th>
                        <th>Akses Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($fixmenus as $menu)
                      <tr>
                        <td>{{$i}}<input name="role_id" type="hidden" value="{{$menu->role_id}}"></td>
                        <td>{{$menu->nav}}</td>
                        <td>{{$menu->subNav}}</td>
                        <td>
                          <input type=checkbox name="menu_hapus[]" id="{{$i}}" value="{{$menu->subnav_id}}">
                        </td>
                        @php ($i++)
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

                </div><!-- /.box-body -->
              </form>
</div><!-- /.box -->
<div class="box">
            <form action="/mapping/{{$role->id}}" method="POST">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
                <div class="box-header">
                  <h3 class="box-title">Tambah Role Mapping</h3><br>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="new_mapping" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Modul</th>
                        <th>Nama Submodul</th>
                        <th>Akses</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($joins as $nav)
                      <tr>
                        <td>{{$i}}<input name="role_id" type="hidden" value="{{$role->id}}"></td>
                        <td>{{$nav->nav}}</td>
                        <td>{{$nav->subNav}}</td>
                        <td>
                        <input type=checkbox name="menu[]" id="{{$i}}" value="{{$nav->subnav_id}}">
                        </td>
                        @php ($i++)
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div><!-- /.box-body -->
              </form>
</div><!-- /.box -->

@endsection

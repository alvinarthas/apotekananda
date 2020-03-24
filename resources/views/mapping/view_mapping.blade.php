@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">ROLE MAPPING</h3><br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl_mapping" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th width="60%">Nama Role</th>
                        <th width="30%">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($roles as $role)
                      <tr>
                        <td>{{$i}} <input name="id" type="hidden" value="{{$role->id}}"></td>
                        <td>{{$role->name}}</td>
                        <td>
                          <a href="/mapping/{{$role->id}}/edit">Edit</a>
                        </td>
                        @php ($i++)
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection

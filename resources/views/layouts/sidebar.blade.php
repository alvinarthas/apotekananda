<?php
use App\Mapping;
use App\Navigation;
use App\Subnav;
?>
<aside class="main-sidebar">
              <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
                <!-- Sidebar user panel -->
      @if(Sentinel::check() && Sentinel::getUser()->username != 'spiderman')
      <?php $pic= Sentinel::getUser()->img; ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/assets/img/{{ Sentinel::getUser()->img}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Sentinel::getUser()->first_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @php($peran = Sentinel::getUser()->roles()->first()->id)
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        @foreach(Mapping::navmapping($peran) as $nav)
        <li class="treeview">
          <a href="">
            <i class="{{$nav->nav_icon}}"></i><span>{{$nav->nav}}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        @foreach(Mapping::subnavmapping($nav->nav_id,$peran) as $sub)
          <ul class="treeview-menu">
            <li><a href="{{$sub->pages}}"><i class="fa fa-circle-o"></i>{{$sub->subNav}}</a></li>
          </ul>
        @endforeach
        </li>
        @endforeach
    </ul>
    @else
    <?php $pic= Sentinel::getUser()->img; ?>
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/assets/img/{{ Sentinel::getUser()->img}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Sentinel::getUser()->first_name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      @foreach(Navigation::navs() as $nav)
      <li class="treeview">
        <a href="">
          <i class="{{$nav->nav_icon}}"></i><span>{{$nav->nav}}</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
      @foreach(Subnav::navsubs ($nav->nav_id) as $sub)
        <ul class="treeview-menu">
          <li><a href="{{$sub->pages}}"><i class="fa fa-circle-o"></i>{{$sub->subNav}}</a></li>
        </ul>
      @endforeach
      </li>
      @endforeach
  </ul>
  @endif
  </section>
              <!-- /.sidebar -->
</aside>

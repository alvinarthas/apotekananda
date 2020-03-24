<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.header')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    @include('layouts.headbar')
    @include('layouts.sidebar')
    <div class="content-wrapper">
    <section class="content">
    <div class="row">
    <div class="col-md-12">
    @yield('content')
    </div>
    </div>
    </section>
    </div>
    </div>
    @include('layouts.footer')
    @yield('footjs')
  </body>
</html>

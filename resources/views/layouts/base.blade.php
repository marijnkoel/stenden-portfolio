<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stenden portfolio | @yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{{ asset('/css/style.css') }}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('css')
  </head>
  <body>
      @include('layouts.nav')
      <!-- content -->
      <div class="content2">
        <div class="homepic">
          <div class="home_text flex-center">
            <h1>@yield('title')</h1>
          </div>
        </div>
        @yield('content')
      </div>
      <!-- einde content -->
      <div class="footer">
        <div class="flex-center footer_text">
          <p>Design: Ramon Drent</p>
          <p>Ontwikkeling: Dominique Netters, Marijn Koel</p>
        </div>
      </div>
  </body>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('script')
</html>

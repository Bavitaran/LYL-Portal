<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @if (Auth::check())
    <meta name="user-id" content="{{ Auth::user()->id }}">
    @endif
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" href="<%= BASE_URL %>favicon.ico"> -->

    <title>LYL Portal</title>

    <!-- Splash Screen/Loader Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/loader.css')) }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <script src="https://kit.fontawesome.com/dd6f5bab82.js" crossorigin="anonymous"></script>
    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        {{-- Datatables Style --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.css">


</head>

<body>
    <noscript>
        <strong>We're sorry</strong>
    </noscript>
    {{-- <div id="loading-bg">
        <div class="loading-logo">
            <img src="{{ asset('logo.png') }}" alt="Logo" />
        </div>
        <div class="loading">
            <div class="effect-1 effects"></div>
            <div class="effect-2 effects"></div>
            <div class="effect-3 effects"></div>
        </div>
    </div> --}}
    <div id="app">
        <div class="flex-center position-ref full-height">

        <div class="content">
            <vue-search
                    endpoint={{config('app.url')}}api/matter
            ></vue-search>
        </div>
    </div>
    </div>

    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <!-- <register-component></register-component> -->

    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Datatables Script --}}
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#MatterTable').DataTable({
              responsive: true
          });
      });
  </script>
</body>

</html>

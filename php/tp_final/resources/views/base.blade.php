<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  <title>@yield('page-title')</title>
  <style>
    html, body, pre, code, kbd, samp {
        font-family: "Press Start 2P";
    }
    .container {
      margin: 0 8rem;
      padding: 2rem;
      min-height: 100vh;
    }
    .mt-2 {
      margin-top: 2rem!important;
    }
  </style>
</head>
<body>
  <div class="container">
    @include('navbar')
    <div class="nes-container with-title mt-2">
      <p class="title">@yield('page-title')</p>
      <p>
        @yield('page-content')
      </p>
    </div>
  </div>
</body>
</html>
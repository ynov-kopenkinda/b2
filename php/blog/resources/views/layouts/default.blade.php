<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>@yield('title')</title>
</head>
<body>

  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{route('index')}}">
        <img style="filter: invert(100%)"src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_440190.png" width="30" height="30" alt="" loading="lazy">
        Contacts
      </a>
      <ul class="navbar-nav flex-row">
        <li class="nav-item ml-2">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="{{ route('contacts.index') }}">List</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="{{ route('contacts.create') }}">Create</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-2">
    <div class="row">
      <div class="col">
        @if ($error ?? '')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div>
        @endif
        @if ($success ?? '')
        <div class="alert alert-success" role="alert">
          {{$message}}
        </div>
        @endif
      </div>
    </div>
    @yield('content')
  </div>
</body>
</html>
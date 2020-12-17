
<nav class="navbar">

  <a href="/" class="navbar-brand">
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fsupplynation.force.com%2Fpublic%2Fresource%2F1537494321000%2Fsna%2Flogo_placeholder.png">
    Restoz
  </a>
  
  <ul class="navbar-nav d-flex">
    <li class="nav-item">
      <a href="{{route('restaurants.index')}}" class="nav-link">List</a>
    </li>
    <li class="nav-item">
      <a href="{{route('restaurants.create')}}" class="nav-link">Create</a>
    </li>
  </ul>

  <a class="ml-auto mr-2 btn" href="{{ route('sendmail') }}">💌</a>
  <form class="form-inline d-flex" action="{{route('restaurants.index')}}">
    <input type="text" class="form-control" name="search" placeholder="Search Restaurants...">
    <button class="btn btn-primary" type="submit">Find</button>
  </form>
</nav>

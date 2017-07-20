<!-- Navbar - Mobile -->
<ul id="nav-mobile" class="side-nav fixed group">

 @if (!Auth::guest())
  
  <!-- User Info -->
  <li>
   <div class="user-view">

    <div class="background">
      <img src="img/background.jpg">
    </div>

    <a href="#!user"><img class=" white responsive-img circle" src="img/logo.png"></a>

    <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>

    <a href="#!email"><span class="white-text email">{{  Auth::user()->email }}</span></a>

    <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    </form>

   </div>
  </li>

  @include('layouts.links')

  @else

  <li><a href="{{ route('login') }}" class="collection-item none"><i class="material-icons left">home</i>Login</a></li>

  <li><a href="{{ route('register') }}" class="collection-item"><i class="material-icons left">assignment</i>Register</a></li>

  @endif 
</ul>

<!--  Open Menu Button -->
<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons teal-text">menu</i></a>
  
  <!-- Navbar -->
  <nav class="light-blue " role="navigation">
    <div class="nav-wrapper">
    	<a id="logo-container" href="#" class="brand-logo">Anxor Ingenieria</a>

    	<!-- Navbar - Not mobile -->
     	<ul class="right hide-on-med-and-down">
     	    <!--<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Username<i class="material-icons right">arrow_drop_down</i></a></li>-->
      	</ul>

		<!-- Navbar - Mobile -->
      	<ul id="nav-mobile" class="side-nav">
          @include('layouts.links')
      	</ul>
      	<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


<!-- Navbar Combobox - Username Button -->
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">My profile</a></li>
  <li><a href="#!">Logout</a></li>
</ul>
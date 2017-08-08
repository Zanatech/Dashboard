<nav class="white" role="navigation">
	<a href="{{ url(config('route.dashboard')) }}" class="brand-logo center teal-text">{!! config('master.logo') !!}</a>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons teal-text">{{ config('icon.menu') }}</i></a>
    <a class="dropdown-button right teal-text" href="#!" data-activates="language-menu">{{ trans('dashboard.language') }} [Not finished]<i class="material-icons right">arrow_drop_down</i></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!--<li><a href="sass.html"><i class="material-icons teal-text">lock</i></a></li>-->
  </ul>
</nav>

<!-- Dropdown - Language Switcher -->
<ul id="language-menu" class="dropdown-content">
  <li><a href="{{ url('home/en') }}">English</a></li>
  <li><a href="{{ url('home/es') }}">Español</a></li>
  <li><a href="{{ url('home/jp') }}">日本語</a></li>
</ul>
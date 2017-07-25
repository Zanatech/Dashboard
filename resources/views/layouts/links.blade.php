<li><a href="{{ route('home') }}" class="collection-item none"><i class="material-icons left">dashboard</i>Home</a></li>
@if( Auth::user()->admin)
<li><a href="{{ route('clients') }}" class="collection-item"><i class="material-icons left">contacts</i>Clients</a></li>
@endif
<li><a href="{{ route('assets') }}" class="collection-item"><i class="material-icons left">list</i>Assets</a></li>
<li><a href="{{ route('jobs') }}" class="collection-item"><i class="material-icons left">assignment</i>Jobs</a></li>
<li><a href="{{ route('tests') }}" class="collection-item"><i class="material-icons left">receipt</i>Tests</a></li>
@if( Auth::user()->admin)
<li><a href="{{ route('home') }}" class="collection-item"><i class="material-icons left">import_export</i>Import from excel</a></li>
@endif
<!--<li><a href="" class="collection-item"><i class="material-icons left">note_add</i>Add new Test</a></li>-->
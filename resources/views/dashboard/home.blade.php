@extends('layouts.app')

@section('content')

<!-- Card Section  -->
<section>
	<div class="row">
		<div class="card">
            <div class="card-content">
            <span class="card-title">Lista de Tareas</span>
            </div>
	    </div>
	    <div class="col s12 m4">
	        <div class="card red darken-2">
	            <div class="card-content white-text">
	              <span class="card-title">Importante!!</span>
	              <p> Aqui va el dashboard, rellenar con datos de utilidad.
	              Estos datos tienen que ser dedicidos cuales son los de mayor importancia</p>
	            </div>
	            <div class="card-action">
	            </div>
	        </div>
	    </div>
	    <div class="col s12 m4">
	        <div class="card">
	            <div class="card-content">
	              <span class="card-title">Graficos de tendencia</span>
	              <p>Rehacer lo graficos de tendencia en Seccion de [Test], de una forma
	              mas limpia.</p>
	            </div>
	            <div class="card-action">
	            </div>
	        </div>
	    </div>
	    <div class="col s12 m4">
	        <div class="card">
	            <div class="card-content">
	              <span class="card-title">Formularios de tablas</span>
	              <p>Realizar los formularios de insercion, actualizacion y eliminacion de datos.
	              [User, Client, Asset, Job, Test]</p>
	            </div>
	            <div class="card-action">
	            </div>
	        </div>
        </div>
        <div class="col s12 m4">
	        <div class="card">
	            <div class="card-content">
	              <span class="card-title">Validaciones</span>
	              <p>Validacion de conexion a base de datos, URL, insercion de datos, actualizacion, roles de acceso</p>
	            </div>
	            <div class="card-action">
	            </div>
	        </div>
        </div>
        <div class="col s12 m4">
	        <div class="card">
	            <div class="card-content">
	              <span class="card-title">Implementacion de roles de usuario</span>
	              <p>Permisos para accesos de ciertos datos, modificaciones.</p>
	            </div>
	            <div class="card-action">
	            </div>
	        </div>
	    </div>
	</div>
</section>

@endsection
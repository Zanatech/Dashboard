@extends('layouts.app')

@section('content')
<body>
    <!-- Banner de informacion -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
          <div class="col s3 m2"></div>
        <div class="col s12 m8">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Importar archivos CSV</h5>

            <p class="light">Archivos CSV o XLSX se importan directamente a la base de datos, para ser almacenados y consultados luego como tabla y/o graficos</p>
          </div>
        </div>
          <div class="col s3 m2"></div>
      </div>

    </div>
  </div>

    <!-- Form para importacion de archivos -->
    <div class="container">
        <div class="section">
            <div class="row">
              <div class="col s24 m12">
                <form action="{{ URL::to('import/file') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Seleccionar archivo</span>
                      <input type="file" name="import_file">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>

                  <button class="btn">Importar</button>
                </form>
              </div>  
            </div>
        </div>
    </div>
</body>
@endsection
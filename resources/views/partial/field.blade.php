
<!--Field 
  -Name  => Nombre del campo, procurar no repetir en el mismo formulario
  -Size  => Tamaño del campo, normalmente m12 s12
  -Text  => Mensaje del campo
  -Type  => Tipo de campo dentro del formulario
 -->

<div class="col {{ $field['size'] }} {{ $errors->has($field['name']) ? 'has-error' : '' }}">

  @if ($field['type'] == 'file')

    <div class="file-field input-field">

      <div class="btn">
        <span>{{ trans('form.'.$field['text']) }}</span>
        <input type="file" name="file_name">
      </div>

      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>

    </div>

    @if ($errors->has($field['name']))
      <span class="help-block">
          <strong>{{ $errors->first($field['name']) }}</strong>
      </span> 
    @endif

  @elseif ($field['type'] == 'timepicker')

    <div class="input-field">
      <i class="material-icons prefix">{{ $field['icon'] }}</i>

      <input
        type="text"
        name="{{ $field['name'] }}" 
        class="form-control timepicker" 
        value="{{ old($field['name']) }}" 
        id="icon_prefix" 
        class="validate">

      <label for="icon_prefix">{{ trans('form.'.$field['text']) }}</label>
    </div>

    @if ($errors->has($field['name']))
      <span class="help-block">
          <strong>{{ $errors->first($field['name']) }}</strong>
      </span> 
    @endif

  @elseif ($field['type'] == 'datepicker')

    <div class="input-field">
      <i class="material-icons prefix">{{ $field['icon'] }}</i>

      <input
        type="text"
        name="{{ $field['name'] }}" 
        class="form-control datepicker" 
        value="{{ old($field['name']) }}" 
        id="icon_prefix" 
        class="validate">

      <label for="icon_prefix">{{ trans('form.'.$field['text']) }}</label>
    </div>

    @if ($errors->has($field['name']))
      <span class="help-block">
          <strong>{{ $errors->first($field['name']) }}</strong>
      </span> 
    @endif

  @elseif ($field['type'] == 'combobox')

    <div class="input-field">

        <select>
          <option value="0" disabled selected>{{ trans('dashboard.combobox_message') }}</option>
          @foreach ($field['data'] as $option)
            <option value="{{ $option['option_value'] }}">{{ $option['option_name'] }}</option>
          @endforeach
        </select>
        <label>{{ trans('form.'.$field['text']) }}</label>

      </div>

    @if ($errors->has($field['name']))
      <span class="help-block">
          <strong>{{ $errors->first($field['name']) }}</strong>
      </span> 
    @endif

  @else
    <div class="input-field">
        <i class="material-icons prefix">{{ $field['icon'] }}</i>

        <input 
          type="{{ $field['type'] }}" 
          name="{{ $field['name'] }}" 
          class="form-control" 
          value="{{ old($field['name']) }}" 
          id="icon_prefix" 
          class="validate">

        <label for="icon_prefix">{{ trans('form.'.$field['text']) }}</label>
      </div>

    @if ($errors->has($field['name']))
      <span class="help-block">
          <strong>{{ $errors->first($field['name']) }}</strong>
      </span> 
    @endif

  @endif

</div>
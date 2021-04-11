    <h1> {{ $modo }} persona</h1>


    @if(count($errors)>0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $errors)
                    <li> {{ $errors }} </li>   
                @endforeach
            </ul>
        </div>

   

    @endif 


    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="{{ isset($persona->Nombre)?$persona->Nombre:old('Nombre') }}" id="Nombre">
    </div>
    <div class="form-group">
        <label for="Apellido">Apellido</label>
        <input type="text" class="form-control" name="Apellido" value="{{ isset($persona->Apellido)?$persona->Apellido:old('Apellido') }}" id="Apellido">
    </div>
    <div class="form-group">
        <label for="Sexo">Sexo</label>
        <input type="text" class="form-control" name="Sexo" value="{{ isset($persona->Sexo)?$persona->Sexo:old('Sexo') }}" id="Sexo">
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="text" class="form-control" name="Telefono" value="{{ isset($persona->Telefono)?$persona->Telefono:old('Telefono') }}" id="Telefono">
    </div>
    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
    <a class="btn btn-primary" href=" {{ url('persona/') }} ">Regresar</a>
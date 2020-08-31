@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><h2>Crear Rol</h2></div>

				<div class="card-body">
					@include('custom.message')
					<form action="{{ route('role.store')}}" method="POST">
						@csrf
						<div class="container">
							<h3>Datos Requeridos</h3>
						</div>
						<div class="form-group">
							<input type="text" class="form-contro" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre de Rol">
						</div>
						<div class="form-group">
							<input type="text" class="form-contro" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Slug">
						</div>
						<div class="form-group">
							<textarea name="description"  class="form-control" placeholder="Descripción" id="description" rows="3">{{ old('description') }}</textarea>
						</div>
						<hr>
						<h3>Acceso Total</h3>
						<div class="form-check form-check-inline">
						  <input type="radio" class="form-check-input" id="accesoTotalSi" name="full_access" value="yes"
						  @if(old('full_access') == "yes")
						  	checked
						  @endif
						>
						  <label class="form-check-label" for="accesoTotalSi">Si</label>
						</div>
						<div class="form-check form-check-inline">
						  <input type="radio" class="form-check-input" id="accesoTotalNo" name="full_access" value="no"
						  @if(old('full_access') === null)
						  	checked
						  @endif
						  @if(old('full_access') == "no")
						  	checked
						  @endif
						  >
						  <label class="form-check-label" for="accesoTotalNo">No</label>
						</div>
						<hr>
						<h3>Lista de permisos</h3>
						@foreach($permissions as $permission)
						<div class="form-check">
						  <input class="form-check-input position-static" type="checkbox" id="permission_{{ $permission->id }}" value="{{$permission->id}}" name="permission[]"
						  @if(is_array(old('permission')) && in_array($permission->id,old('permission')))
						  	checked
						  @endif
						  >
							<label class="form-check-label" for="permission_{{ $permission->id }}">
								{{ $permission->table_name }} - {{ $permission->name}} <em>( {{ $permission->description }})</em>
							</label>
						</div>
						@endforeach
						<hr>
						<input type="submit" class="btn btn-primary" value="Guardar">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

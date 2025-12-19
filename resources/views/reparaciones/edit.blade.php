@extends('layouts.app')
@section('titulo', 'Editar reparación')
@section('contenido')
    <h1 class="mb-4">Editar reparación</h1>
    <form action="{{ route('reparaciones.update', $reparacion) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">tipo de bicicleta *</label>
                <input
                    type="text"
                    name="tipo_bicicleta"
                    class="form-control @error('tipo_bicicleta') is-invalid @enderror"
                    value="{{ old('tipo_bicicleta', $reparacion->tipo_bicicleta) }}"
                >
                @error('tipo_bicicleta')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">marca *</label>
                <input
                    type="text"
                    name="marca"
                    class="form-control @error('marca') is-invalid @enderror"
                    value="{{ old('marca', $reparacion->marca) }}"
                >
                @error('marca')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">¿que se necesita reparar o cambiar? *</label>
                <textarea
                    name="reparacion_necesita"
                    rows="4"
                    class="form-control @error('reparacion_necesita') is-invalid @enderror"
                >{{ old('reparacion_necesita', $reparacion->reparacion_necesita) }}</textarea>
                @error('reparacion_necesita')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Dueño *</label>
                <input
                    type="text"
                    name="nombre_dueno"
                    class="form-control @error('nombre_dueno') is-invalid @enderror"
                    value="{{ old('nombre_dueno', $reparacion->nombre_dueno) }}"
                >
                @error('nombre_dueno')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">teléfono *</label>
                <input
                    type="text"
                    name="telefono"
                    class="form-control @error('telefono') is-invalid @enderror"
                    value="{{ old('telefono', $reparacion->telefono) }}"
                >
                @error('telefono')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">estado *</label>
                <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                    <option value="esperando" {{ old('estado', $reparacion->estado) === 'esperando' ? 'selected' : '' }}>Esperando</option>
                    <option value="trabajando" {{ old('estado', $reparacion->estado) === 'trabajando' ? 'selected' : '' }}>Trabajando</option>
                    <option value="lista" {{ old('estado', $reparacion->estado) === 'lista' ? 'selected' : '' }}>Lista</option>
                    <option value="recogida" {{ old('estado', $reparacion->estado) === 'recogida' ? 'selected' : '' }}>Recogida</option>
                </select>
                @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection

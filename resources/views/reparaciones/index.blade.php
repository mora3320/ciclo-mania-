@extends('layouts.app')
@section('titulo', 'Reparaciones')

@section('contenido')
        <div class="container py-4">
            <div class="row g-4 align-items-start">
                <div class="col-12 col-lg-4">
                    <h1 class="mb-0">reparaciones</h1>

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a class="btn btn-outline-secondary {{ request()->boolean('pendientes') ? '' : 'active' }}"
                           href="{{ route('reparaciones.index') }}">
                            todas
                        </a>

                        <a class="btn btn-outline-primary {{ request()->boolean('pendientes') ? 'active' : '' }}"
                           href="{{ route('reparaciones.index', ['pendientes' => 1]) }}">
                            reparacion pendiente
                        </a>

                        <a class="btn btn-primary"
                           href="{{ route('reparaciones.create') }}">
                            Nueva reparacion
                        </a>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                            <tr>
                                <th>Ingreso</th>
                                <th>Bici</th>
                                <th>Daño</th>
                                <th>Dueño</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th style="width: 170px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($reparaciones as $r)
                                <tr>
                                    <td>{{ optional($r->created_at)->format('d/m/Y H:i') }}</td>

                                    <td>
                                        <div class="fw-semibold">{{ $r->tipo_bicicleta }}</div>
                                        <div class="text-muted small">{{ $r->marca }}</div>
                                    </td>

                                    <td>{{ \Illuminate\Support\Str::limit($r->reparacion_necesita, 55) }}</td>

                                    <td>{{ $r->nombre_dueno }}</td>
                                    <td>{{ $r->telefono }}</td>

                                    <td>
                                        <span class="badge bg-secondary">{{ strtoupper($r->estado) }}</span>
                                    </td>

                                    <td class="text-nowrap">
                                        <a href="{{ route('reparaciones.edit', $r) }}" class="btn btn-sm btn-warning">Editar</a>

                                        <form action="{{ route('reparaciones.destroy', $r) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este registro?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        {{ request()->boolean('pendientes') ? 'no hay registros pendientes.' : 'no hay registros.' }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $reparaciones->withQueryString()->links() }}
                </div>
            </div>
        </div>
    @endsection

@extends('layouts.app')
@section('titulo', 'Reparaciones')

@section('contenido')
    <div class="row g-4 align-items-start">
        <div class="col-lg-4">
            <h1 class="mb-0">reparaciones</h1>

            <div class="d-flex flex-wrap gap-2 mt-3">
                <a class="btn btn-outline-secondary" href="{{ route('reparaciones.index') }}">todas</a>
                <a class="btn btn-outline-primary" href="{{ route('reparaciones.index', ['pendientes' => 1]) }}">reparacion pendiente</a>
                <a class="btn btn-outline-dark" href="{{ route('reparaciones.index', ['retiradas' => 1]) }}">retiradas</a>
                <a class="btn btn-primary" href="{{ route('reparaciones.create') }}">Nueva reparacion</a>
            </div>
        </div>

        <div class="col-lg-8">
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
                                @php
                                    $badge = 'bg-secondary';
                                    if ($r->estado === 'retirado') $badge = 'bg-dark';
                                @endphp
                                <span class="badge {{ $badge }}">{{ strtoupper($r->estado) }}</span>
                            </td>
                            <td>
                                @if($r->estado !== 'retirado')
                                    <a href="{{ route('reparaciones.edit', $r) }}" class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('reparaciones.destroy', $r) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Marcar como retirado?')">
                                            Eliminar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">no hay registros.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $reparaciones->withQueryString()->links() }}
        </div>
    </div>
@endsection

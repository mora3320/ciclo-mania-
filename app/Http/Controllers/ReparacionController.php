<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function index(Request $request)
    {
        $query = Reparacion::query()->orderByDesc('created_at');

        if ($request->boolean('pendientes')) {
            $query->whereNull('retirado_at')
                ->whereIn('estado', ['esperando', 'trabajando']);
        }

        if ($request->boolean('retiradas')) {
            $query->whereNotNull('retirado_at');
        }

        $reparaciones = $query->paginate(10);

        return view('reparaciones.index', compact('reparaciones'));
    }

    public function create()
    {
        return view('reparaciones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_bicicleta' => 'required|string|max:30',
            'marca' => 'required|string|max:40',
            'reparacion_necesita' => 'required|string|max:1000',
            'nombre_dueno' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'estado' => 'required|in:esperando,trabajando,lista,recogida',
        ]);

        $validated['retirado_at'] = null;

        Reparacion::create($validated);

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación registrada correctamente.');
    }

    public function edit(Reparacion $reparacione)
    {
        return view('reparaciones.edit', ['reparacion' => $reparacione]);
    }

    public function update(Request $request, Reparacion $reparacione)
    {
        $validated = $request->validate([
            'tipo_bicicleta' => 'required|string|max:30',
            'marca' => 'required|string|max:40',
            'reparacion_necesita' => 'required|string|max:1000',
            'nombre_dueno' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'estado' => 'required|in:esperando,trabajando,lista,recogida',
        ]);

        $reparacione->update($validated);

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación actualizada.');
    }

    public function destroy(Reparacion $reparacione)
    {
        $reparacione->update([
            'estado' => 'retirado',
            'retirado_at' => now(),
        ]);

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación marcada como retirado.');
    }
}

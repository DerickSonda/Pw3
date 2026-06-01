<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class KeepController extends Controller
{
    public function index() {
        $notas = Nota::all();

        return view('keep/index', [
            'notas' => $notas,
    ]);

    }

    public function create () {
         return view('keep/create');

    }

    public function store(Request $request) {
        $request->validate([
            'nota' => 'required|min:5|max:255',
            'cor'  => 'required',
        ]);

        Nota::create([
            'nota' => $request->nota,
            'cor'  => $request->cor,
        ]);

        return redirect()->route('keep.index')
            ->with('mensagem', 'Nota adicionada com sucesso.');
    }

    public function edit(Nota $nota) {
        return view('keep/edit', [
            'nota' => $nota,
        ]);
    }

    public function update(Request $request, Nota $nota) {
        $request->validate([
            'nota' => 'required|min:5|max:255',
            'cor'  => 'required',
        ]);

        $nota->update([
            'nota' => $request->nota,
            'cor'  => $request->cor,
        ]);

        return redirect()->route('keep.index');
    }

    public function destroy(Nota $nota) {
        $nota->delete();

        return redirect()->route('keep.index');
    }
}

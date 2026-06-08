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
            'lixeiraCount' => Nota::onlyTrashed()->count(),
        ]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {

            $dados = $request->validate([
                'nota' => 'required|max:255',
                'cor' => 'required'
            ]);
            
            Nota::create($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota criada com sucesso.');
        }

        return view('keep/create');
    }

    public function edit(Request $request, Nota $nota) {
        if ($request->isMethod('put')) {

            $dados = $request->validate([
                'nota' => 'required|max:255',
                'cor' => 'required'
            ]);
            
            $nota->update($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota atualizada com sucesso.');
        }
        return view('keep.create', [
            'nota' => $nota,
        ]);
    }

    public function delete(Nota $nota) {
        if (request()->isMethod('delete')) {
            $nota->delete();

            return redirect()->route('keep.index')->with('mensagem', 'Nota movida para a lixeira.');
        }

        return view('keep.delete', [
            'nota' => $nota,
        ]);
    }

    public function trash() {
        $notas = Nota::onlyTrashed()->latest('deleted_at')->get();

        return view('keep.trash', [
            'notas' => $notas,
        ]);
    }

    public function restore(Nota $nota) {
        $nota->restore();

        return redirect()->route('keep.trash')->with('mensagem', 'Nota restaurada com sucesso.');
    }

    public function forceDelete(Nota $nota) {
        $nota->forceDelete();

        return redirect()->route('keep.trash')->with('mensagem', 'Nota excluída definitivamente.');
    }
}

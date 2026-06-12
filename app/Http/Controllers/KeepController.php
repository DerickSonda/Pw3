<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'cor' => 'required',
                'imagem' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('imagem')) {
                $dados['imagem'] = $request->file('imagem')->store('notas', 'public');
            }

            Nota::create($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota criada com sucesso.');
        }

        return view('keep/create');
    }

    public function edit(Request $request, Nota $nota) {
        if ($request->isMethod('put')) {

            $dados = $request->validate([
                'nota' => 'required|max:255',
                'cor' => 'required',
                'imagem' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('imagem')) {
                // Remove a imagem antiga antes de guardar a nova
                if ($nota->imagem) {
                    Storage::disk('public')->delete($nota->imagem);
                }
                $dados['imagem'] = $request->file('imagem')->store('notas', 'public');
            } else {
                // Sem upload: nao sobrescreve a imagem existente
                unset($dados['imagem']);
            }

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
        if ($nota->imagem) {
            Storage::disk('public')->delete($nota->imagem);
        }

        $nota->forceDelete();

        return redirect()->route('keep.trash')->with('mensagem', 'Nota excluída definitivamente.');
    }
}

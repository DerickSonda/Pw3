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
        Nota::create([
            'nota' => $request->input('nota'),
            'cor'  => '#ffffff',
        ]);
        return redirect()->route('keep.index');
    }
}

<!-- keep/edit.blade.php -->
@extends('keep/_base')

@section('conteudo')
    <form method="post" action="{{ route('keep.update', $nota->id) }}">
        @csrf
        @method('PUT')
        <textarea name="nota">{{ $nota->nota }}</textarea>
        <br>
        <input type="color" name="cor" value="{{ $nota->cor }}">
        <br>
        <input type="submit" value="Atualizar">
    </form>
    <br>
    <a href="{{ route('keep.index') }}"><button>Voltar</button></a>
@endsection

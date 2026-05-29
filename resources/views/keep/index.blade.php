@extends('keep/_base')
@section('conteudo')
<p>Bem-vindo ao Keepintinho!</p>
<p><a href="{{ @route('keep.create') }}">Adicionar nota</a></p>

@endsection


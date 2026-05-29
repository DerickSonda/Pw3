@extends('keep/_base')
@section('conteudo')
<p>Bem-vindo ao Keepintinho!</p>
<p><a href="{{ @route('keep.create') }}">Adicionar nota</a></p>
<hr>
@foreach ($notas as $nota )


<div style="
background-color: {{ $nota['cor'] }};
padding: 2px;">

{{ $nota['nota'] }}
</div>

@endforeach

@endsection


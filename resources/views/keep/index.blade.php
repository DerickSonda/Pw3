@extends('keep/_base')
@section('conteudo')

@if (session('mensagem'))
<div id="aviso" style="color: green;">{{ session('mensagem') }}</div>
<script>
    setTimeout(function () {
        document.getElementById('aviso').style.display = 'none';
    }, 5000);
</script>
@endif

<p>Bem-vindo ao Keepintinho!</p>
<p><a href="{{ route('keep.create') }}">Adicionar nota</a></p>
<hr>
@foreach ($notas as $nota )


<div class="nota" style="background-color: {{ $nota['cor'] }};">

{{ $nota['nota'] }}

<a href="{{ route('keep.edit', $nota['id']) }}">📑</a>

<form method="post" action="{{ route('keep.destroy', $nota['id']) }}">
    @csrf
    @method('DELETE')
    <button type="submit">❌</button>
</form>

<small>feito {{ $nota->created_at->locale('pt_BR')->diffForHumans() }}</small>
</div>

@endforeach

@endsection


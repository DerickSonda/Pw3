@extends('keep/_base')

@section('conteudo')
    <p>Bem-vindo ao Keepintinho!</p>
    <div class="barra">
        <a href="{{ route('keep.create') }}">Adicionar nota</a>
        <a href="{{ route('keep.trash') }}">🗑️ Lixeira ({{ $lixeiraCount }})</a>
    </div>
    <hr>

    @if (session('mensagem'))
        <div class="mensagem">👍 {{ session('mensagem') }}</div>
    @endif

    @foreach ($notas as $nota)
        <div class="nota" style="background-color: {{ $nota['cor'] }}; color: {{ $nota['cor_texto'] }}">
            {{ $nota['nota'] }}
            <br><br>
            <small style="color: {{ $nota['cor_texto'] }}; opacity: .8">
                Criada {{ \Carbon\Carbon::parse($nota['created_at'])->locale('pt_BR')->diffForHumans() }}
                @if (!empty($nota['updated_at']) && $nota['updated_at'] != $nota['created_at'])
                    <br>Editada {{ \Carbon\Carbon::parse($nota['updated_at'])->locale('pt_BR')->diffForHumans() }}
                @endif
            </small>
            <div class="acoes">
                <a href="{{ route('keep.edit', $nota['id']) }}">📝</a>
                <a href="{{ route('keep.delete', $nota['id']) }}">❌</a>
            </div>
        </div>
    @endforeach
@endsection
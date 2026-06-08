{{-- keep/trash.blade.php --}}
@extends('keep/_base')

@section('conteudo')
    <p>
        <a href="{{ route('keep.index') }}">← Voltar para as notas</a>
    </p>
    <h2>🗑️ Lixeira</h2>
    <hr>

    @if (session('mensagem'))
        <div class="mensagem">{{ session('mensagem') }}</div>
    @endif

    @forelse ($notas as $nota)
        <div class="nota" style="background-color: {{ $nota['cor'] }}; color: {{ $nota['cor_texto'] }}">
            {{ $nota['nota'] }}
            <br><br>
            <small style="color: {{ $nota['cor_texto'] }}; opacity: .8">
                Excluída {{ \Carbon\Carbon::parse($nota['deleted_at'])->locale('pt_BR')->diffForHumans() }}
            </small>
            <div class="acoes">
                <form method="post" action="{{ route('keep.restore', $nota['id']) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit">♻️ Restaurar</button>
                </form>
                <form method="post" action="{{ route('keep.forceDelete', $nota['id']) }}"
                      onsubmit="return confirm('Excluir esta nota PARA SEMPRE? Esta ação não pode ser desfeita.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">❌ Excluir definitivamente</button>
                </form>
            </div>
        </div>
    @empty
        <p>A lixeira está vazia.</p>
    @endforelse
@endsection

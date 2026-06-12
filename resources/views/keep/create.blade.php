<!-- keep/create.blade.php -->
@extends('keep/_base')

@section('conteudo')
    @if ($errors->any())
        <div class="erros">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ isset($nota) ? route('keep.edit', $nota['id']) : route('keep.create') }}"
          enctype="multipart/form-data">
        @csrf
        @if (isset($nota))
            @method('PUT')
        @endif
        <textarea name="nota">{{ old('nota', $nota['nota'] ?? '') }}</textarea>
        <br>
        <input type="color" name="cor" value="{{ old('cor', $nota['cor'] ?? '') }}">
        <br>

        @if (!empty($nota['imagem']))
            <div style="margin: 8px 0">
                <img src="{{ asset('storage/' . $nota['imagem']) }}" alt="Imagem da nota"
                     style="max-width: 160px; border-radius: 8px; display: block">
            </div>
        @endif

        <label for="imagem">Imagem (opcional)</label><br>
        <input type="file" name="imagem" id="imagem" accept="image/*">
        <br>
        <input type="submit" value="Gravar">
    </form>

    <a href="{{ route('keep.index') }}">Cancelar</a>
@endsection
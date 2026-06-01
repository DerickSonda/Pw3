<!-- Keep/create.blade.php-->
 @extends('keep/_base')

 @section('conteudo')
    <form method="post" action="{{ route('keep.store') }}">
        @csrf
        <textarea name = "nota"></textarea>
        <br>
        <input type="color" name="cor">
        <br>
        <input type="submit" value="Gravar">
    </form>
    <br>
    <a href="{{ route('keep.index') }}"><button>Voltar</button></a>
 @endsection
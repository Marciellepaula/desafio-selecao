<x-layout title='Editar Jogador'>

    <h1>Editar Jogador</h1>
   
    <form action="/playersupdate/{{ $player->id }}" method="POST">
        @csrf
        @method('PUT')  
        <label>Nome: </label>
        <input type="text" name="name" id="name" value="{{ $player->name }}"><br><br>
        <label>CPF: </label>   
        <input type="text" name="cpf" id="cpf" value="{{ $player->cpf }}"><br><br>
        <label>Numero da Camisa: </label>
        <input type="number" name="tshirt_number" id="tshirt_number" value="{{ $player->tshirt_number }}"><br><br>
        <button type="submit">Editar</button>
    </form>

</x-layout>

<x-layout title='Listar'>

    <a href="/createPlayer">Cadastrar</a>

    <h1>Listar Jogadores</h1>


    <table>
        <thead>
            <tr>
                <th>Cpf</th>
                <th>Nome</th>
                <th>Numero camisa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($players as $player)
                <tr>
                    <td>{{ $player->cpf }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->tshirt_number }}</td>
                    <td>{{ $player->id }}</td>
                    <td> 
                        <a href="/editplayer/{{$player->id}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>

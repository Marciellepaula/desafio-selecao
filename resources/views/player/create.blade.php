<x-layout title='Cadastrar'>

    <a href="/playerList">Listar</a>


    <h1>Cadastrar</h1>
  
   

    <form action="/storea" method="POST"   enctype="multipart/form-data">
        @csrf
        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder=""><br><br>
        <label>CPF: </label>
        <input type="text" name="cpf" id="cpf" placeholder=""><br><br>
        <label>Numero da blusa: </label>
        <input type="text" name="tshirt_number" id="tshirt_number" placeholder=""><br><br>
        <button type="submit">Cadastrar</button>
    </form>

</x-layout>




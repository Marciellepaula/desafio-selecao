# Desafio Back-End - Campeonato de Futebol da ECorreção

A ECorreção está organizando um campeonato de futebol de salão no final do ano entre os seus funcionários. Como serão vários times e em dias diferentes a diretoria solicitou o desenvolvimento de um sistema para controlar o campeonato.

A equipe de análise colheu as informações de como a diretoria espera que o sistema funcione e encaminhou à equipe de desenvolvimento para começar o desenvolvimento da aplicação.

Resumo da análise feita pela _Palmira_, uma das analistas envolvidas no projeto:

> Esta aplicação deverá representar um campeonato de futebol de salão. Cada time poderá conter no máximo 5 jogadores em campo incluindo o goleiro. Não haverá reservas, juiz ou bandeirinha.
>
> A equipe de RH poderá cadastrar os jogadores como também distribuir os jogadores nos seus respectivos times. Uma vez escalado o jogador não poderá mudar de time, mas a equipe de RH poderá ajustar: o nome do jogador, número da sua camiseta e o nome do time se necessário. Não será possível cadastrar um jogador com CPF duplicado.
>
> Os jogos serão registrados após a realização dos mesmos, desta forma será necessário preencher os seguintes dados: Data da partida, Hora de início da partida, Hora de término da partida, times e o placar para a classificação final. Um detalhe importante é que poderá ser editado a partida caso tenha alguma informação incorreta.
>
> Por fim, a diretoria gostaria de exibir de forma automática o ranking dos times com melhor placar e também um ranking dos jogadores para premiação na festa.
>
> Contamos com a equipe para iniciarmos o desenvolvimento o quanto antes.
>
> Bom Trabalho!
Atenciosamente, Palmira.

Neste momento, você está escalado para trabalhar com a equipe e aplicar os seus conhecimentos no desenvolvimento dessa aplicação.

## Sua API deverá ser capaz de:
1. Cadastrar, editar e listar os jogadores
- Nome*
- CPF*
- Número da camiseta*
2. Cadastrar, editar e listar os times
- Nome do time
- Jogadores
3. Cadastrar e editar as partidas
- Data*
- Horário início*
- Horário término*
- Times*
- Placar*
4. Listar a classificação dos times no campeonato
- Time

##  Regras para o desenvolvimento:

- A arquitetura deverá respeitar as boas práticas do RestFull;
- A linguagem implementada deverá ser em PHP;
- A api deverá ser implementada usando o framework Laravel;
- Deverá usar um banco de dados relacional para armazenar os dados;

## Como sua prova será avaliada:

- Correto funcionamento;
- Tratamento de erros;
- Implementação de padrões de projeto (design patterns, SOLID, etc);
- Documentação dos endpoints;
- Código limpo e organizado;
- Modelagem do banco de dados;

Boa sorte! Aguardamos pela sua prova :smile:.

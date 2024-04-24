<!doctype html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
    <meta name    = "viewport" content = "width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- FontAwesome -->
    <link rel  = "stylesheet" href                                                             = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
  </head>
<body>
    {{-- Estilos --}}
    <style>
    body{
        font-family     : 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        background-color: #F0F8FF
    }

    header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Estilos para o título */
        h1 {
            margin: 0;
        }

        /* Estilos para a descrição */
        p {
            margin: 5px 0 0 0;
        }

    .table, th, td{
        border         : 1px solid;
        border-collapse: collapse;
        width          : 100px;
        border         : 1px solid;
        justify-content: center;
    }

    table{
        width: 100%;
    }

    .div-table{
        display        : flex;
        justify-content: center;
    }

    .divisao {
    /* Definindo o gradiente */
    background: linear-gradient(to right, #ff9a9e, #fad0c4);
    padding: 20px;
    border-radius: 5px;
    display: flex;
    justify-content: space-evenly;
    }

    .tipo-item {
        /* Estilos para cada item dentro da div */
        margin: 10px 0;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8); /* Cor de fundo com transparência */
        border-radius: 3px;
        display: flex;
        align-items: center;
    }

    .tipo-item i {
        /* Estilos para o ícone */
        margin-right: 10px;
        color: #333;
    }

    .div-table {
        background-color: #FFDAB9; /* Laranja suave */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .Btnbtn{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        }

    th, td{
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        width: 1%;
    }
    th {
        background-color: #FFA07A; /* Laranja mais forte para os cabeçalhos */
        color: white;
    }

    button.btn-primary {
        background-color: #FFA07A; /* Laranja mais forte */
        border: none;
        color: white;
    }

    button.btn-danger {
        background-color: #DC143C; /* Vermelho escuro para botão de deletar */
        border: none;
        color: white;
    }

    button.btn-primary:hover,
    button.btn-danger:hover {
        opacity: 0.8;
    }

    btn.btn-primary.butt{
        display: flex;
    }



    </style>
    {{-- Fim Estios --}}

    <header>
        <h1>Estoque de Materiais</h1>
        <p>Jonathan</p>

       <button type="button" class="btn btn-light"> <a href = "/marcas">Marcas</a> </button>
       <button type="button" class="btn btn-light"> <a href = "/estoque">Estoque</a> </button>
       <button type="button" class="btn btn-light"> <a href = "/produto">Produto</a> </button>
    </header>


    {{-- Exibir contadores por tipo --}}
    <div class = "divisao">
        @foreach ($countTipos as $tipo => $count)
        <div>
            <i class = "fas fa-tag"></i> {{ $tipo }}: {{ $count }}
        </div>
        @endforeach
    </div>
    {{-- colocar contadores para cada tipo da tabela marcas --}}
    <div   class = "div-table">
    <table class = "table">
        <thead>
          <tr>
            <th scope = "col">ID</th>
            <th scope = "col">Produto</th>
            <th scope = "col">Tipo</th>
            <th scope = "col">Quantidade</th>
            <th scope = "col">Valor</th>
            <th scope = "col">Ações</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
          <tr>
            <th scope = "row">{{$produto->id}}</th>
            <td>{{$produto->produto}}</td>
            <td>{{$produto->tipo}}</td>
            <td>{{$produto->quant}}</td>
            <td>{{$produto->valor}}</td>
            <td>
                <div class="Btnbtn"><!-- Botão Editar com Modal -->
                <button type = "button" class = "btn btn-primary" data-bs-toggle = "modal" data-bs-target = "#editarModal{{ $produto->id }}">
                    Editar
                </button>
                <form action = "/produto/{{ $produto->id }}" method = "post">
                    @csrf
                    @method('DELETE')
                    <button type = "submit" class = "btn btn-danger" >Deletar</button>
                </form>
                </div>

                <!-- Modal de Edição -->
                <div    class = "modal fade" id  = "editarModal{{ $produto->id }}" tabindex = "-1" aria-labelledby = "editarModalLabel{{ $produto->id }}" aria-hidden = "true">
                <div    class = "modal-dialog">
                <div    class = "modal-content">
                <div    class = "modal-header">
                <h5     class = "modal-title" id = "editarModalLabel{{ $produto->id }}">Editar Produto</h5>
                <button type  = "button" class   = "btn-close" data-bs-dismiss              = "modal" aria-label   = "Fechar"></button>
                            </div>
                            <div class = "modal-body">
                                <!-- Formulário de Edição -->
                                <form action = "/produto/{{ $produto->id }}" method = "POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Campo de Nome do Produto -->
                                    <div   class = "mb-3">
                                    <label for   = "nomeProduto" class = "form-label">Nome do Produto</label>
                                    <input type  = "text" class        = "form-control" id = "nomeProduto" name = "nome_produto" value = "{{ $produto->produto }}">
                                    </div>

                                    <!-- Campo de Quantidade -->
                                    <div   class = "mb-3">
                                    <label for   = "quantidade" class = "form-label">Quantidade</label>
                                    <input type  = "number" class     = "form-control" id = "quantidade" name = "qtd_produto" value = "{{ $produto->quant }}">
                                    </div>

                                    <!-- Campo de Valor -->
                                    <div   class = "mb-3">
                                    <label for   = "valor" class = "form-label">Valor</label>
                                    <input type  = "text" class  = "form-control" id = "valor" name = "valor_produto" value = "{{ $produto->valor }}">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulário de Deletar -->

            </td>
        </tr>
    @endforeach
        </tbody>
      </table>
    </div>
      <script> </script>
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin = "anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset    = "UTF-8">
    <meta name       = "viewport" content        = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <link rel="stylesheet" href="css/produtoBlade.css">
    <link rel="stylesheet" href="javascript/scripts.js">
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">

    <title>Document</title>
</head>
<body>

<header>
    <h1>Estoque de Materiais</h1>
    <p>Jonathan</p>
   <div    class = "linkbtn">
   <button type  = "button" class = "btn btn-light"> <a href = "/marcas">Marcas</a> </button>
   <button type  = "button" class = "btn btn-light"> <a href = "/estoque">Estoque</a> </button>
   <button type  = "button" class = "btn btn-light"> <a href = "/produto">Produto</a> </button>
    </div>
</header>

{{-- Fim Estios --}}
<div class = "container">
    <h1>Materiais em Estoque</h1>
    <form action = "/produto" method = "POST">
        @csrf
        <label  for   = "marca_id">Selecione uma Marca:</label>
        <div    class = "marca-inputs">
        <select name  = "nome_marcas" class = "select-marcas">
        <option value = "" selected> Selecione a marca</option>
                        @foreach($nomesUnicos as $marca)
                        <option value = "{{ $marca }}">{{ $marca }}</option>
                        @endforeach
            </select>
        </div>
        <br>
        <label  for   = "produto_id">Selecione o tipo do produto:</label>
        <div    class = "tipo-inputs">
        <select name  = "id_marcas" class = "select-tipo">
        <option value = "" selected> Selecione o tipo</option>
            </select>
        </div>
        <br>
        <!-- ... restante do código ... -->
        <label for  = "produto">Produto: </label>
        <input type = "text" name = "nome_produto" placeholder = "Digite o nome do produto: ">
                <br>
        <label for = "quant">Quantidade: </label>
        <input id  = "quant" type = "text" name = "qtd_produto" maxlength = "10" placeholder = "Digite a quantidade: ">
                <br>
        <label for  = "valor">Valor: </label>
        <input type = "text" name = "valor_produto" maxlength = "10" placeholder = "Digite a valor">
                <br>
        <button type = "submit">Enviar</button>
    </form>
</div>

<br>

<footer>
    <div>
        <h3>Estoque de Materiais</h3>
        <a>Estoque de materiais onde havera todos os itens cadastrados</a>
    </div>
    <div class="redes-sociais">
        <img src="img/instagram.png" alt="Instagram">
        <img src="img/facebook.png" alt="Facebook">
        <img src="img/github.png" alt="Github">
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
  const selectMarcas = document.querySelector('.select-marcas');
      // Seleciona o elemento select com a classe 'select-marcas'

      // Event listener para o evento 'change' do select
  selectMarcas.addEventListener('change', function() {
      const selectTipo       = document.querySelector('.select-tipo');
      const marcaSelecionada = this.value;                              // Valor selecionado no select
          // Faz a requisição à rota desejada com o valor da marca
      fetch(`/produto/${marcaSelecionada}`)
          .then(response => response.json())
          .then(data => {
              selectTipo.innerHTML = '<option value="" selected>Selecione o tipo</option>';
              data.forEach(tipo => {
                  selectTipo.innerHTML += `<option value="${tipo.id}">${tipo.tipo}</option>`;
              });
                  // Aqui você pode fazer algo com os dados retornados, como preencher outro select
          })
          .catch(error => {
              console.error('Erro ao fazer requisição:', error);
          });
  });
});

</script>
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin = "anonymous"></script>

</body>
</html>

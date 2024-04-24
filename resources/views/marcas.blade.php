<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset    = "UTF-8">
    <meta name       = "viewport" content        = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <link rel="stylesheet" href="css/marcasBlade.css">
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">

    <title>Document</title>
</head>
<body>
<header>
    <h1>Estoque de Materiais</h1>
    <p>Jonathan</p>

   <button type="button" class="btn btn-light"> <a href = "/marcas">Marcas</a> </button>
   <button type="button" class="btn btn-light"> <a href = "/estoque">Estoque</a> </button>
   <button type="button" class="btn btn-light"> <a href = "/produto">Produto</a> </button>
</header>

<div class="formMarca">
<form action = "/marcas" method = "POST">
    @csrf
    <label for = "marcas">Marcas: </label>
    <div class="inputMarca">
    <input id  = "marcas" type = "text" name = "marcas" placeholder = "Digite a marca">
    <br>
    <label for  = "marcas">Tipo: </label>
    <input type = "text" name = "tipo" id = "tipo" placeholder = "Digite a marca">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Enviar</button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Marca</h1>
              <button type="button" class="btn-close hide" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
</form>
</div>

<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin = "anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('exampleModal'), {});

        var enviarBtn = document.getElementById('enviarBtn');

        enviarBtn.addEventListener('click', function () {
            var form = document.querySelector('form');
            form.submit();

            // Fecha o modal após 3 segundos (3000 milissegundos)
            setTimeout(function() {
                modal.hide();
            }, 3000);
        });
    });
</script>

</body>
</html>

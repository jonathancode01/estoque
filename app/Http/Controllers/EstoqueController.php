<?php

namespace App\Http\Controllers;
use App\Models\Estoques;
use App\Models\Produtos;
use App\Models\Marcas;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
          // Index: recupera registros do banco
    public function index()
    {
              // Vou retornar os dados da tabela estoque
        $produtos = Produtos::all();
        $marcas   = Marcas::all();

              // criando um array pra armazenar um novo tipo de produto para o contador
        $countTipo = [];

              // Busca os tipos únicos de produtos
        $tiposUnicos = $marcas->pluck('tipo')->unique();

              // Contagem de produtos por tipo
        foreach ($tiposUnicos as $tipo) {
            $countTipos[$tipo] = Produtos::join('marcas', 'produtos.marca_id', '=', 'marcas.id')
                                        ->where('marcas.tipo', $tipo)
                                        ->count();
        }

        // Para cada produto, obtemos a marca associada e contamos
        $produtos->each(function ($produto) use (&$countProdutosPorTipo, $marcas) {
            // Obtém a marca associada ao produto
            $marca = $marcas->firstWhere('id', $produto->marca_id);

            if ($marca) {
                // Incrementa a contagem para o tipo de marca
                    $produto->tipo = $marca->tipo;
            }
        });

              // Passa as variáveis para a view
        return view('estoque', compact('produtos', 'marcas', 'countTipos'));
    }
    public function store(Request $request)
    {

    }

          /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

          /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
              //
    }

          /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
              //
    }

          /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->delete();
        return redirect('estoque')->with('success', 'Produto excluído com sucesso.');
    }

    public function produtosPorMarca($marca_id){
              // Busca todos os produtos que têm a marca_id igual ao $marcaId fornecido
        $produtos = Produtos::where('marca_id', $marca_id)->get();

        return response()->json($produtos);
    }

}

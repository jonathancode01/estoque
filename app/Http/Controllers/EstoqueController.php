<?php

namespace App\Http\Controllers;
use App\Models\Estoques;
use App\Models\Produtos;
use App\Models\Marcas;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
      public function index()
      {

        $produtos = Produtos::select('produtos.id', 'produtos.produto', 'marcas.tipo', 'produtos.quant', 'produtos.valor')
        // Aqui estamos fazendo um JOIN (junção) entre a tabela produtos e marcas com base em suas chaves primárias e estrangeiras.
        ->join('marcas', 'produtos.marca_id', '=', 'marcas.id')
        ->get();
          $marcas = Marcas::all();

          // criando um array pra armazenar um novo tipo de produto para o contador
          $countTipos = [];

          // Busca os tipos únicos de produtos
          $tiposUnicos = $marcas->pluck('tipo')->unique();

          // Contagem de produtos por tipo
          foreach ($tiposUnicos as $tipo) {
              $countTipos[$tipo] = Produtos::join('marcas', 'produtos.marca_id', '=', 'marcas.id')
                  ->where('marcas.tipo', $tipo)
                  ->count();
          }



        //   dd($countTipos);
          // Passa as variáveis para a view
          return view('estoque', compact('produtos', 'marcas', 'countTipos', 'tiposUnicos'));
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

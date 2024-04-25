<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Marcas;


class ProdutoController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos    = Produtos::all();
        $marcas      = Marcas::all();


        $nomesUnicos = $marcas->pluck('marcas')->unique()->sort();
        return view('produto', compact('produtos', 'nomesUnicos'));

    }


      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          //
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // dd($request->all());
         $validatedData = $request->validate([
            'nome_marcas'   => 'required|string',
            'id_marcas'     => 'required|string',
            'nome_produto'  => 'required|string',
            'qtd_produto'   => 'required|integer',
            'valor_produto' => 'required|decimal:2',
        ]);

          // Se a validação passar, crie um novo produto
        Produtos::create([
            'marca_id' => $validatedData['id_marcas'],
            'produto'  => $validatedData['nome_produto'],
            'quant'    => $validatedData['qtd_produto'],
            'valor'    => $validatedData['valor_produto'],
            # dd($request->all())
        ]);

          // Redirecionar para alguma rota ou fazer algo com o produto criado
        return redirect('/produto')->with('success', 'Produto criado com sucesso!');
    }


      /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          //
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
    public function update(Request $request, $id)
    {
          // valido todos os dados disponiveis para atualizar
        $validatedData = $request->validate([
            'nome_produto'  => 'required|string',
            'qtd_produto'   => 'required|integer',
            'valor_produto' => 'required|decimal:2',
        ]);
          // Na tabela produtos eu faço uma busca através do id
        $produto = Produtos::findOrFail($id);
        $produto = Produtos::findOrFail($id);
        if (!$produto) {
            return redirect()->back()->withErrors(['error' => 'Produto não encontrado']);
        }


          // Atualizo os dados
        $produto->produto = $validatedData['nome_produto'];
        $produto->quant   = $validatedData['qtd_produto'];
        $produto->valor   = $validatedData['valor_produto'];

        $produto->save();

          // Buscar todos os produtos novamente após a atualização
        $produtos = Produtos::all();

        return view('estoque', compact('produtos'))->with('success', 'Produto atualizado com sucesso!');
    }

      /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          //
    }

    public function produtosPorMarca($marca_id){
        $marcasalgumas = Marcas::where('marcas' , $marca_id)->get(['tipo', 'id']);
          // Busca todos os produtos que têm a marca_id igual ao $marcaId fornecido
          // $produtos = Produtos::where('marca_id', $marca_id)->get();

        return response()->json($marcasalgumas);
    }

    public function ajaxPesquisa ($idMarca , $idProduto) {

          // buscar todos os produtos que tem a marcas vinculadas
          // $idProduto = Produtos::where('idProduto', $idProduto);
          // dd($idProduto);

          // return response()->json([$idMarca, $idProduto]);

    }

}

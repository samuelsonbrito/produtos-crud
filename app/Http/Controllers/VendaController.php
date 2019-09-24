<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Usuario;
use App\Venda;
use Illuminate\Http\Request;
use JansenFelipe\CepGratis\CepGratis;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{

    public function index()
    {
        $venda = DB::table('vendas')->get();

        return view('venda.index', compact('venda'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $usuario = Usuario::select('ID_USUARIO', 'NOME')->get();
        $produto = Produto::select('ID_PRODUTO', 'NOME')->get();

        return view('venda.create', compact('usuario', 'produto'));
    }

    public function pdf(Venda $venda)
    {
        $venda = DB::table('vendas')
            ->leftJoin('produtos', 'vendas.PRODUTO_ID', '=', 'produtos.ID_PRODUTO')
            ->select('vendas.*', 'produtos.NOME as PRODUTO','produtos.PRECO')
            ->get();

        $html = '<h1>Relatório</h1>';

        foreach ($venda as $p) {
            $html .= '<ul>';
            $html .= "<li>PRODUTO: 			" . $p->PRODUTO . "</li>";
            $html .= "<li>DATA VENDA: 	" . \Carbon\Carbon::parse($p->DATA_VENDA)->format('d/m/Y'). "</li>";
            $html .= "<li>PREÇO: 			" . $p->PRECO . "</li>";
            $html .= '</ul>';
        }

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();
    }


    public function store(Request $request)
    {
        Venda::create($request->all());
        return redirect()->route('venda.index')->with('success', 'Venda criada com sucesso.');
    }


    public function edit(Venda $venda)
    {
        $venda = Venda::select('ID_VENDA', 'NUMERO_VENDA')->get();
        return view('venda.edit')->with('venda', $venda)->with('venda', $venda);
    }

    public function update(Request $request, Venda $venda)
    {
        $venda->update($request->all());
        return redirect()->route('venda.index')
            ->with('success', 'Venda atualizada com sucesso');
    }

    public function buscacep(Request $request)
    {
        $dados = CepGratis::search($request->get('term'));
        return response()->json($dados);
    }

    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('venda.index')
            ->with('success', 'Venda excluído com sucesso');
    }
}

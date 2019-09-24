<?php
  
namespace App\Http\Controllers;
  
use App\Produto;
use Illuminate\Http\Request;
  
class ProdutoController extends Controller
{

    public function index()
    {
        $produto = Produto::latest()->paginate(5);
        return view('produto.index',compact('produto'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        return view('produto.create');
    }
  

    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect()->route('produto.index')
                        ->with('success','Produto criado com sucesso.');
    }
   

    public function show(Produto $produto)
    {
        return view('produto.show')->with('produto',$produto);
    }
   

    public function edit(Produto $produto)
    {
        return view('produto.edit')->with('produto',$produto);
    }
  

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.index')
                        ->with('success','Produto atualizado com sucesso');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index')
                        ->with('success','Produto excluído com sucesso');
    }
}
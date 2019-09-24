<?php
  
namespace App\Http\Controllers;
  
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
  
class UsuarioController extends Controller
{

    public function index()
    {
		$usuario = DB::table('usuarios')
			->get();
  
        return view('usuario.index',compact('usuario'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        $usuario= Usuario::select('ID_USUARIO','NOME')->get();
        return view('usuario.create',compact('usuario'));
    }
  
    public function store(Request $request)
    {
        Usuario::create($request->all());
        return redirect()->route('usuario.index')
                        ->with('success','Usuario criado com sucesso.');
    }
   
    public function show(Usuario $usuario)
    {
		$usuario = DB::table('usuarios')
			->first();
			
        return view('usuario.show',compact('usuario'));
    }
   
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit')->with('usuario',$usuario);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $Curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return redirect()->route('usuario.index')
                        ->with('success','Usuario atualizado com sucesso');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $Curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.index')
                        ->with('success','Usuario excluído com  sucesso');
    }
}
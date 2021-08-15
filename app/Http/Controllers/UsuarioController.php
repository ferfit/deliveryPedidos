<?php


namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'nombre'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);


        $usuario = User::create([
            'name' => $data['nombre'],
            'email' => $data['email'],
            'password' => Crypt::encryptString($data['password'])
            
        ]);

        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $clave = Crypt::decryptString($usuario->password);

        return view('admin.usuarios.edit',compact('usuario','clave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        
        $data = request()->validate([
            'nombre'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        //asignamos los valores
        $usuario->name = $data['nombre'];
        $usuario->email= $data['email'];
        $usuario->password = Crypt::encryptString($data['password']);
        
        $usuario->save();

        return redirect()->route('admin.usuarios.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('admin.usuarios.index');  
    }
}

<?php


namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'razonSocial'=>'required',
            'cuit'=>'required',
            'direccion'=>'required',
            'localidad'=>'required',
            'provincia'=>'required',
            'whatsapp'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);


        $usuario = User::create([
            'name' => $data['nombre'],
            'razonSocial' => $data['razonSocial'],
            'cuit' => $data['cuit'],
            'direccion' => $data['direccion'],
            'localidad' => $data['localidad'],
            'provincia' => $data['provincia'],
            'whatsapp' => $data['whatsapp'],
            'email' => $data['email'],
            'password' => hash::make( $data['password'])
            
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
        

        return view('admin.usuarios.edit',compact('usuario'));
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
            'razonSocial'=>'required',
            'cuit'=>'required',
            'direccion'=>'required',
            'localidad'=>'required',
            'provincia'=>'required',
            'whatsapp'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        //asignamos los valores
        $usuario->name = $data['nombre'];
        $usuario->razonSocial= $data['razonSocial'];
        $usuario->cuit = $data['cuit'];
        $usuario->direccion= $data['direccion'];
        $usuario->localidad = $data['localidad'];
        $usuario->provincia= $data['provincia'];
        $usuario->whatsapp = $data['whatsapp'];
        $usuario->email= $data['email'];
        $usuario->password = $data['password'];
        
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

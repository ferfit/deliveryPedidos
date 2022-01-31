<div>
    <div class="container">
        <table class="table bg-white mt-2 shadow">
            <thead>
                <tr>
                    <th>Franquicia</th>
                    <th>Razón Social</th>
                    <th>Cuit</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Whatsapp</th>
                    <th>Email</th>
                    <th style="width:200px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>

                        <td>{{ $usuario->name }}</td>
                        <td>{{$usuario->razonSocial}}</td>
                        <td>{{$usuario->cuit}}</td>
                        <td>{{$usuario->direccion}}</td>
                        <td>{{$usuario->localidad}}</td>
                        <td>{{$usuario->provincia}}</td>
                        <td>{{$usuario->whatsapp}}</td>
                        <td>{{ $usuario->email }}</td>



                        <td>
                            <div class="row mx-auto">
                                <a href="{{ route ('admin.usuarios.edit', $usuario)}}" class="btn btn-primary mr-2 shadow"><i
                                    class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.password', $usuario) }}" class="btn btn-warning mr-2 shadow"><i
                                    class="fas fa-lock text-white"></i></a>

                                <form action="{{ route ('admin.usuarios.destroy', $usuario)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger shadow">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class=" mx-auto">
            {{$usuarios->links()}}
        </div>

    </div>

</div>

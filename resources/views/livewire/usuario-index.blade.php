<div>
    <div class="container">
        <table class="table bg-white mt-2 shadow">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th style="width:200px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <div class="row mx-auto">
                                <a href="{{ route ('admin.usuarios.edit', $usuario)}}" class="btn btn-primary mr-2 mb-1 shadow">Editar</a>
                            
                                <form action="{{ route ('admin.usuarios.destroy', $usuario)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger d-inline mr-1 shadow  "
                                        value="Eliminar">
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

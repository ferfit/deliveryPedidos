<div>
    <div class="container mx-auto">
        <input wire:model="search" class="form-control mt-3 w-50" type="search"
            placeholder="Buscar categoria por nombre...">
        <table class="table bg-white shadow mt-2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th style="width: 200px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <div class="row mx-auto">
                            <a href="{{ route('admin.categorias.edit', $categoria )}}" class="btn btn-primary mr-2"><i
                                class="fas fa-edit"></i></a>

                            <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" >
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
            {{ $categorias->onEachSide(0)->links() }}
        </div>
    </div>

</div>

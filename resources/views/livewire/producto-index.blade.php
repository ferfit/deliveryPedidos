<div class="">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class=" container ">
        <hr>
        <div class=" row  py-2 rounded">
    <button class="btn btn-info mx-2 shadow" wire:click="resetFilter">Todos</button>
    <div class="dropdown shadow">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Categorias
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($categorias as $categoria)
                <a wire:click="$set('category_id',{{ $categoria->id }})" class="dropdown-item"
                    href="#">{{ $categoria->nombre }}</a>
            @endforeach
        </div>
    </div>
</div>

<input wire:model="search" class="form-control mt-3 w-50" type="search" placeholder="Buscar producto por nombre...">
<div class="table-responsive container-fluid">
    <table class="table bg-white mt-2 shadow-sm">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th >Precio</th>
                <th>Categoria</th>
                <th >Min</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="@if ($producto->estado == 'inactivo') bg-secondary @endif">
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td >${{ $producto->precio }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td >{{ $producto->minimo }}</td>
                    <td>
                        <div class="row mx-auto">
                            <a href="{{ route('admin.productos.edit', $producto) }}"
                                class="btn btn-primary mr-2 mb-1 shadow"><i
                                class="fas fa-edit"></i></a>

                            <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST">
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
</div>


<div class=" mx-auto">
    {{ $productos->onEachSide(0)->links() }}
</div>




</div>

</div>

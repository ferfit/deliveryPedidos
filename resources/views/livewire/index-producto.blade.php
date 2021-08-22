<div class="mt-5">
    <div class="row  py-2 rounded">
        <button class="btn btn-dark mx-2 shadow" wire:click="resetFilter">Todos</button>
        <div class="dropdown shadow">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    <input wire:model="search" class="form-control mt-3 w-50" type="search"
        placeholder="Buscar producto por nombre...">
    <table class="table bg-white mt-2 shadow">
        <thead>
            <tr>
                <th>Producto</th>
                <th >Categoria</th>
                <th class="d-none d-lg-block">Precio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>

                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>${{ $producto->precio }}</td>
                    <td>
                        <div class="row mx-auto">
                            @livewire('cantidad-producto',['producto' => $producto], key($producto->id))
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class=" mx-auto">
            {{ $productos->onEachSide(0)->links() }}
        </div>
</div>

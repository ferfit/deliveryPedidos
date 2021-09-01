<div class="mt-5">
    {{-- <div class="row  py-2 rounded">
        <button class="btn btn-dark mx-2 shadow" wire:click="resetFilter">Todos</button>
        <div class="dropdown shadow">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
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
    </div> --}}

    <input wire:model="search" class="form-control mt-3 w-50" type="search" placeholder="Buscar producto por nombre...">
    <table class="table bg-white mt-2 shadow">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoria</th>
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
                        <div class="row ">

                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn__cantidad d-block" x-bind:disabled="$wire.qty <= 1"
                                    > <i class='bx bxs-minus-square'></i></button>
                                <input type="number" wire:model="qty" id="qty-{{$producto->id}}">
                                <button type="button" class="btn btn__cantidad" onclick="sumar(})"> <i
                                        class='bx bxs-plus-square'></i></button>
                            </div>

                            <div class="d-flex justify-content-center align-items-center mt-2">
                                <button type="button" class="btn btn-danger font-bold"
                                    wire:click="agregarCarrito({{ $producto }})" wire:loading.attr="disabled"
                                    wire:target="agregarCarrito()">AGREGAR</button>
                            </div>

                            {{-- <button type="button" class="btn btn-danger font-bold" wire:click="$set('open',true)"
                                wire:loading.attr="disabled" wire:target="agregarCarrito()">AGREGAR
                            </button> --}}


                            <!-- Button trigger modal -->
                            {{-- <button type="button"
                                class="btn btn-danger shadow d-flex justify-content-center align-items-center"
                                data-toggle="modal" data-target="#exampleModal">
                                <i class='bx bx-plus'></i>
                            </button> --}}

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center align-items-center">
                                                
                                                <input type="number" class="form-control border-secondary"
                                                    wire:model.defer="qty">
                                                
                                                
                                            </div>

                                            <div class="d-flex justify-content-center align-items-center mt-2">

                                            </div>
                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-danger font-bold"
                                                wire:click="agregarCarrito({{ $producto }})"
                                                wire:loading.attr="disabled" wire:target="agregarCarrito()"
                                                data-dismiss="modal">AGREGAR</button>
                                            <button type="button" class="btn btn-dark"
                                                data-dismiss="modal">SALIR</button>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- @livewire('cantidad-producto',['producto' => $producto], key($producto->id)) --}}

                        </div>
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>
    <div class=" mx-auto">
        {{ $productos->onEachSide(0)->links() }}
    </div>


    <script>
        function sumar(id){
            var cantidad = document.getElementById('#qty'+id)

            console.log(cantidad)

        }
    </script>
</div>

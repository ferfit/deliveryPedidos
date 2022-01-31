<div class="mt-5">
    <div class="row  py-2 rounded">
        <button class="btn btn-dark mx-2 shadow" wire:click="resetFilter">Todos</button>
        <div class="dropdown shadow">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Categorias
            </button>

            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                <div class="d-flex flex-wrap w-100">


                    @foreach ($categorias as $categoria)
                        <a wire:click="$set('category_id',{{ $categoria->id }})" class="dropdown-item d-block w-50"
                            href="#">{{ $categoria->nombre }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <input wire:model.defer="search"  wire:keydown.enter="render" class="form-control mt-3 w-50" type="search"  placeholder="Buscar producto por nombre...">
    <div class="table-responsive container-fluid">
        <table class="table bg-white mt-2 shadow-sm ">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th >Precio</th>
                   {{--  <th>Min</th> --}}
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td><span class="bg-dark text-white p-2 rounded">{{ $producto->categoria->nombre }}</span></td>
                        <td>${{ $producto->precio }}</td>
                        {{-- <td>10u</td> --}}
                        <td>


                            <form class="mt-auto d-flex justify-content-center align-items-center" method="POST"	>

                                <input type="number" wire:model.defer="cantidad" name="cantidad" value="1"  min="1" class="form-control w-25 mr-2">


                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-danger font-bold"
                                    wire:click="sumarAlCarrito({{$producto}})"

                                    wire:loading.attr="disabled"
                                    wire:target="agregarCarrito">AGREGAR</button>
                                </div>

                            </form>
                        </td>
                    </tr>
                @endforeach




            </tbody>
        </table>
    </div>
    <div class=" mx-auto overflow-hidden">
        {{ $productos->links() }}
    </div>



    <!-- Button trigger modal -->
    <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        Agregar
    </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


    {{-- <script>
        function sumar(id){
            var cantidad = document.getElementById('#qty'+id)

            console.log(cantidad)

        }
    </script> --}}
</div>

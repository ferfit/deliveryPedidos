<div>
    <div>
        <div class="container mx-auto">
            <input wire:model="search" class="form-control mt-3 w-50" type="search"
                placeholder="Buscar orden por...">
            <table class="table  table bg-white shadow mt-2">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Franquiciado</th>
                        <th>Dirección</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th style="width: 200px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                    <tr>
                        <td>{{ $orden->id }}</td>
                        <td>{{ $orden->nombre }}</td>
                        <td>{{ $orden->direccion }}</td>
                        <td>${{ $orden->total }}</td>
                        <td>
                            @switch( $orden->estado )
                                @case(1)
                                    <small class="badge badge-warning"> Pendiente</small>
                                    @break
                                @case(2)
                                    <small class="badge badge-primary"> En proceso</small>
                                    @break
                                @case(3)
                                    <small class="badge badge-success"> Enviado</small>
                                    @break
                                @case(0)
                                    <small class="badge badge-danger"> Cancelado</small>
                                    @break
                                @default
                                    
                            @endswitch
                            
                        </td>
                        <td>
                            <div class="row mx-auto">
                                <a href="{{ route('admin.ordens.show', $orden )}}" class="btn btn-secondary mr-2 text-white">Ver</a>
                                <a href="{{ route('admin.ordens.edit', ['ordene' => $orden ] )}}" class="btn btn-primary mr-2">Editar</a>
                            </div>
                            
                        </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
            </table>
            <div class=" mx-auto">
                {{ $ordenes->onEachSide(0)->links() }}
            </div>
        </div>
    
    </div>
    
</div>

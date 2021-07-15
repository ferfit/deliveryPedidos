<div>
    <div class="dropdown">
        
        <img src="img/carrito.svg" class="position-relative" alt="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if (Cart::count())
        <span class="carrito__cantidad position-absolute">{{Cart::count()}}</span>
        @endif
        


        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">

          <ul class="p-0 m-0">
            @forelse (Cart::content() as $item )
              <li class="d-flex carrito__lista border-bottom p-2">
                {{-- <img src="{{$item->options->imagen}}" alt="" class="w-25"> --}}
                <article class="d-flex flex-wrap ">
                  <h1 class="col-12">{{$item->name}}</h1>
                  <div class="d-flex col-12">
                    <p class="m-0">Cant:{{$item->qty}} </p>
                    <p class=" m-0 ml-2">Precio: ${{$item->price}}</p>
                  </div>
                </article>
                
              </li>
            @empty
              <p class="dropdown-item m-0"> No tiene agregado ningún producto al carrito.</p>
            @endforelse
          </ul>
          {{-- si existe item en mi carrito --}}
          @if (Cart::count()) 
          <div class="carrito__total">
            <p class="">Total: ${{Cart::subtotal()}}</p>
          </div>

          <div class=" mt-2">
            <a type="button" href="{{ route('carrito')}}" class="btn btn-danger carrito__ver-carrito font-bold d-block mx-auto"
            >IR AL CARRITO</a>
          </div>
            
          @endif



        </div>
    </div>

    <span class="valor-carrito" id="valor-carrito"></span>

</div>

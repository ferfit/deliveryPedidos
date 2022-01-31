<table>
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>
        @foreach($productos as $p)
        <tr>
            <td>{{$p->options->codigo}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->qty}}</td>
            <td>{{$p->price}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<table>
    <thead>
    <tr>

        <th >Cliente</th>
        <th></th>
        <th></th>
        <th >Total</th>

    </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{ $ordene->nombre}}</td>
            <td></td>
            <td></td>
            <td>{{$ordene->total}}</td>
        </tr>

    </tbody>
</table>

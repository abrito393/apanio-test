@extends('Layouts.app')

@section('content')
<h2 align="center">Datos Historicos Bitcoin</h2>
<table class="table table-dark table-hover" style="text-align: center; ">
    <thead>
      <tr>
        <th>Moneda</th>
        <th>Precio</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $singleData )
            <tr>
                <td>{{$singleData->coin}}</td>
                <td>{{$singleData->usd_price}}$</td>
                <td>{{$singleData->created_at->diffForHumans()}}</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
@extends('layouts.master')

@section('content')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
            <img src="{{$pelicula['poster']}}" style="height:200px"/>
        </a>

    </div>
    <div class="col-sm-8">

        <h4>{{$pelicula['title']}}</h4>
        <h6>A&ntilde;o: {{$pelicula['year']}}</h6>
        <h6>Director: {{$pelicula['director']}}</h6>
        <p><strong>Resumen:</strong> {{$pelicula['synopsis']}}</p>
        <p><strong>Estado: </strong>
            @if($pelicula['rented'])
                Pel&iacute;cula actualmente alquilada.
            @else
                Pel&iacute;cula en stock.
            @endif
        </p>
        <form action="{{url('/catalog/changeRented/' . $pelicula->id)}}" method="post">
        {{method_field('PUT')}}
        @csrf
        {{--route('changeRented', array('id' => $pelicula->id))--}}
            @if($pelicula['rented'])
                <input type="submit" class="btn btn-danger" value="Devolver pel&iacute;cula">
            @else
                <input type="submit" class="btn btn-primary" value="Alquilar pel&iacute;cula">
            @endif
            <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $pelicula->id ) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar pel&iacute;cula</a>
            <a class="btn btn-outline-info" href="{{ action('App\Http\Controllers\CatalogController@getIndex') }}">Volver al listado</a>

        </form>

    </div>
</div>

@stop

@stop

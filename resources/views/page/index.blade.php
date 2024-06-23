@extends('main.main')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Тип оборудования</th>
            <th scope="col">Название оборудования</th>
            <th scope="col">Сирийный номер</th>
            <th scope="col">Примечание</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>


        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->type_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->serial_number }}</td>
            <td>{{ $product->desc }}</td>
            <td>
            </td>
        </tr>
        @endforeach


        </tbody>
    </table>
@endsection

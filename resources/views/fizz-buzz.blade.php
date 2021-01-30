@extends('layout')
@section('content')
    <div class="card" style="width: 20rem;">
        <div class="card-header">
            Fizz Buzz - 1 to 20
        </div>
        <div class="card-body">
            @foreach($array as $value)
                <div class="font-weight-lighter">{{ $value }}</div>
            @endforeach
        </div>
    </div>
@endsection

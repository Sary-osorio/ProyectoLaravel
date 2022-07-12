@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center bg-white p-1 shadow  mb-5  rounded">
            <div class="col-6 ">
                @include('components.carouselproducto')
            </div>
            <div class="col-6">

                @include('components.targetproducto')

            </div>
        </div>
    </div>
@endsection

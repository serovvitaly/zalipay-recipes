@extends('default.layout')

@section('content')
<div class="col-lg-2">
@include('default.tags-block')
</div>
<div class="col-lg-10">
    <div class="row">
        @yield('content')
    </div>
</div>
@overwrite
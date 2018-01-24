@extends('default.layout')

@section('content')
<div class="col-lg-7">
    <div class="row">
        @yield('content')
    </div>
</div>
<div class="col-lg-5">
    Боковая панель
</div>
@overwrite
@extends('default.layout')

@section('content')
<div class="col-lg-9">
    <div class="row">
        @yield('content')
    </div>
</div>
<div class="col-lg-3">
    Боковая панель
</div>
@overwrite
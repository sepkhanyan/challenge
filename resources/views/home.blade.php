@extends('layouts.app')

@section('content')
    <div class="container">


        <router-view name="posts"></router-view>
        <router-view></router-view>
    </div>
@endsection

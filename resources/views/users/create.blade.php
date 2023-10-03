@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<center>
    <h1 class="text-2x1 font-semibold leading-tigh py-2">Novo Usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form class="border-2 border-black bg-blue-200 rounded p-5 w-1/5" action="{{route('users.store')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome:" value="{{old('name')}}" class="my-4 border-2 border-black"><br>
    <input type="email" name="email" placeholder="E-mail:" value="{{old('email')}}" class="my-4 border-2 border-black"><br>
    <input type="password" name="password" placeholder="Senha:" class="my-4 border-2 border-black "><br>
    <button type="submit" class="bg-blue-900 ronded-full text-white px-4 text-sm border-2 border-black ">Enviar</button>
</form>
</center>
@endsection
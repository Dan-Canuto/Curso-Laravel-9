@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
<center><h1 class="text-2x1 font-semibold leading-tigh py-2">Listagem dos Usuários
    <a href="{{route('users.create')}}" class="bg-blue-900 ronded-full text-white px-4 text-sm border-2 border-black px-2">+</a>
</h1>
<div class="w-auto bg-blue-100 py-5 border-2 border-black">
<table class="w-3/5">
    <tr >
        <td class="border-2 border-black">Nome</td>
        <td class="border-2 border-black">Email</td>
        <td></td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td class="border-2 border-black">{{$user->name}}</td>
            <td class="border-2 border-black">{{$user->email}}</td>
            <td ><a class="bg-blue-900 ronded-full text-white px-4 text-sm border-2 border-black px-2" href="{{route('users.edit', $user->id)}}">Editar</a><a class="bg-blue-900 ronded-full text-white px-4 text-sm border-2 border-black " href="{{route('users.show', ['id' => $user->id])}}">Detalhes</a></td>

        </tr> 
    @endforeach
</table>
</center>

    
@endsection
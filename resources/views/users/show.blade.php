
@extends('layouts.app')

@section('title', 'Listagem do Usuário')

@section('content')
<center>
    <h1 class="text-2x1 font-semibold leading-tigh">Listagem do usuário <br>{{$user->name}}</h1>
    <br>
    <div>
        <table class="border-2 border-black w-1/5">
            <tr>
                <th class="border-2 border-black">Nome</th>
                <td class="border-2 border-black">{{$user->name}}</td>
            </tr>
            <tr>
                <th class="border-2 border-black">Email</th>
                <td class="border-2 border-black">{{$user->email}}</td>
            </tr>
        </table>
        <br>
        <form action="{{route('users.destroy', $user->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="bg-red-500 border-2 text-white border-black" type="submit">Deletar</button>
        </form>
    </div>
</center>
@endsection
<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();

        return view('users.index', compact('users'));
    }
    public function show($id){
        // $user = User::where('id', '=', $id)->first();
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index');

        // return redirect()->route('users.show', $user->$id);
        // $user = new User;
        // $user->name = $requesr->name;
        // $user->email = $requesr->email;
        // $user->password = $requesr->password;
        // $user->save();
    }

    public function edit($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }
    
    public function update(StoreUpdateUserFormRequest $request, $id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
        $data = $request->only('name', 'email');
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id){
        // $user = User::where('id', '=', $id)->first();
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
        $user->delete();
        return view('users.show', compact('user'));
    }

    public function login(){
        return view('users.login');
    }

    public function valida(Request $request){
        $email = $request->email;
        $senha = $request->password;
        

        $users = User::get();

        foreach($users as $user){
            if($user->email == $email && password_verify($senha, $user->password)){
                return redirect()->route('users.index');   
            }
        }
        return view('users.login');
    }
}

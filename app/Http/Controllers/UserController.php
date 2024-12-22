<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $messages = [
            'email.required' => 'Preencher o campo de e-mail é obrigatório!',
            'email.email' => 'O campo de e-mail precisa conter um e-mail válido!',
            'email.unique' => 'Este e-mail já está sendo utilizado!',
            'password.required' => 'Preencher o campo de senha é obrigatório!',
            'password.confirmed' => 'Confirmar a senha é obrigatório!',
            'password.min' => 'A senha precisa ter pelo menos 9 dígitos!',
            'password.regex' => 'A senha precisa conter pelo menos uma letra e um número!'
        ];

        $data = $request->validate([
            "email" => "required|email|unique:App\Models\User,email",
            "password" => "required|string|min:9|regex:/([A-Za-z])(\d)/|confirmed"
        ], $messages);

        $data["password"] = bcrypt($request['registerPassword']);

        $user = User::create($data);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){
        $messages = [
            'loginEmail.required' => 'Preencher o campo de e-mail é obrigatório!',
            'loginEmail.email' => 'O campo de e-mail precisa conter um e-mail válido!',
            'loginPassword.required' => 'Preencher o campo de senha é obrigatório!'
        ];

        $data = $request->validate([
            "loginEmail" => "required|email",
            "loginPassword" => "required|string"
        ], $messages);

        if (auth()->attempt(["email"=> $data["loginEmail"],"password"=> $data["loginPassword"]])) {
            request()->session()->regenerate();
        }

        return redirect('/');
    }
}
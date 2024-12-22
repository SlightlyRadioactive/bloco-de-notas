<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloco de notas</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;
            margin: 0;
        }

        .content {
            display: flex;
            border: 3px solid black;
            border-radius: 15px;
            justify-content: center;
            width: 40%;

            & button {
                margin-top: 10px;
            }
        }

        .formGroup {
            margin: 10px;
        }

        .center {
            display: flex;
            align-items: center;
        }

        .field {
            margin-top: 5px;

            & label,
            input {
                display: block;
            }
        }

        .errors {
            display: block;
            color: red;
            font-weight: bold;
        }

        input {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px;
        }

        h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    @auth
        <p>You are in!</p>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Desconectar</button>
        </form>
    @else
        <div class="content">
            <div class="formGroup">
                <h3>Acessar conta</h3>
                <form method="POST" action="/login">
                    @csrf
                    <input type="hidden" name="user" id="user" value="user">
                    <div class="field">
                        <label for="loginEmail">E-mail</label>
                        <input type="text" name="loginEmail" id="loginEmail" value="{{ old('loginEmail') }}">
                    </div>
                    <div class="field">
                        <label for="loginPassword">Senha</label>
                        <input type="password" name="loginPassword" id="loginPassword" value="{{ old('loginPassword') }}">
                    </div>
                    <button type="submit">Entrar</button>
                </form>
            </div>
            <div class="formGroup center">
                <p>ou</p>
            </div>
            <div class="formGroup">
                <h3>Criar conta</h3>
                <form method="POST" action="/register">
                    @csrf
                    <input type="hidden" name="user" id="user" value="user">
                    <div class="field">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="field">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password"
                            value="{{ old('password') }}">
                    </div>
                    <div class="field">
                        <label for="password_confirmation">Confirme sua senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            value="{{ old('password_confirmation') }}">
                    </div>
                    <button type="submit">Registrar</button>
                </form>
            </div>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
        </div>
    @endauth
</body>
</html>
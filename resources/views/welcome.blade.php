<x-layout>
    @auth
        <p>You are in!</p>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Desconectar</button>
        </form>
    @else
        <div class="contentHome">
            <div class="formGroup">
                <h3>Acessar conta</h3>
                <form method="POST" action="/login">
                    @csrf
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
</x-layout>
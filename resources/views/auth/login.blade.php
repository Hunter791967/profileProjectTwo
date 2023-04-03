<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('first/styles/style.css') }}">
    <title>ProfileProject | Login</title>
</head>

<body>
    <div class="box">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="main_container">
            <form class="log_form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="top">
                    <header>Login Form</header>
                </div>
                <div class="input-field">
                    <x-text-input id="email" class="input" placeholder="NAME / EMAIL" type="text" name="nande"
                        :value="old('nande')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="err_inputMsg" />
                </div>
                <div class="input-field">
                    <x-text-input id="password" class="input" placeholder="Password" type="password" name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="err_inputMsg" />
                </div>
                <div class="input-field">
                    <x-primary-button class="submit">
                        {{ __('Log in') }}
                    </x-primary-button>

                </div>
                <div class="two-col">
                    <div class="one">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="two">
                        @if (Route::has('password.request'))
                            <a class="already_reg" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

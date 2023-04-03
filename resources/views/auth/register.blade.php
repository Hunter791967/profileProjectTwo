<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('first/styles/style.css') }}">
    <title>ProfileProject | Register</title>
</head>

<body>
    <div class="box">
        <div class="main_container">

            <form class="reg_form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="top">
                    {{-- <span>Have an account?</span> --}}
                    <header>Registration Form</header>
                </div>
                <div class="input-field">
                    <x-text-input id="name" class="input" type="text" placeholder="Username" name="name"
                        :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="input-field">
                    <x-text-input id="email" type="email" class="input" placeholder="EMAIL" name="email"
                        :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="input-field">
                    <x-text-input id="password" class="input" placeholder="Password" type="password" name="password"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="input-field">
                    <x-text-input id="password_confirmation" class="input" placeholder="Confirm Password"
                        type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="input-fieldOne">
                    <a class="already_reg" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
                <div class="input-field">
                    <x-primary-button class="submit">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>

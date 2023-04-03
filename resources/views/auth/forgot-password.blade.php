<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('first/styles/style.css') }}">
    <title>ProfileProject | Forgot-Password</title>
</head>

<body>
    <div class="box">
        <div class="main_container">

            <form class="forgot_form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4 text-sm text-gray-600 forgot_text">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>


                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Address -->
                <div class="input-field">

                    <x-text-input placeholder="ENTER YOUR EMAIL" class="input" type="email" name="email"
                        :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="input-field">
                    <x-primary-button class="submit">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>



        </div>
    </div>
</body>

</html>

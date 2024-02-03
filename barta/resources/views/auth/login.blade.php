
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
</head>
<body>

    <div id="card_table" class="border-0 card p-2 m-auto mt-5 w-25 table-responsive table-responsive-sm">
        <div class="text-center">
            <a style="font-size: 60px" class="text-decoration-none fw-bold text-dark" href="#">Barta</a>
        </div><br>
        <div class="card-title text-center">
            <h3>Sign In Your Account</h3>
        </div>
        <div class="card-body">
            @include('frontend.validation.validation')
            <form action="{{ route('login') }}" method="POST">
                @csrf
               <div class="mb-3">
                    <label for="">Email</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid
                    @enderror" placeholder="Enter Your Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                    <input  type="submit" class="form-control btn btn-dark" value="Login">
               </div>
            </form>
            <p class="mt-10 text-center text-dark">
                Already a member?
                <a style="color:black"
                  href="#"
                  class="text-decoration-none fw-bolder"
                  >Forget Password</a>
              </p>
              <p class="mt-10 text-center text-dark">If You Don't Have Account?
                <a style="color:black" class="text-decoration-none fw-bolder" href="{{ route('register') }}">Sign Up</a>
              </p>
        </div>
    </div>

    <!-- js Files -->
<script src="assets/bootstrap/js/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="assets/bootstrap/js/app.js"></script>
</body>
</html>




{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

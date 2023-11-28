

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h3>Create A New Account</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
               <div class="mb-3">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
               </div>
               <div class="mb-3">
                    <label for="">UserName</label>
                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Enter Your userName" value="{{ old('username') }}">
                    @error('username')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
               </div>
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
                    <input name="password" type="text" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                    <label for="">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Your password">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                    <input  type="submit" class="form-control btn btn-dark" value="Register">
               </div>
            </form>
            <p class="mt-10 text-center text-dark">
                Already Have Account?
                <a style="color:black"
                  href="{{ route('login') }}"
                  class="text-decoration-none fw-bolder"
                  >Sign In</a>
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
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!--Username-->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

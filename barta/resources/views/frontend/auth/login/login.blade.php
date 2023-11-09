
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
            {{-- @php
                app\Models\Register::
            @endphp --}}
            <form action="{{ route('user.login') }}" method="POST">
                @csrf
               <div class="mb-3">
                    <label for="">Email</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid
                    @enderror" placeholder="Enter Your Email">
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
                    <input  type="submit" class="form-control btn btn-dark" value="Register">
               </div>
            </form>
            <p class="mt-10 text-center text-dark">
                Already a member?
                <a style="color:black"
                  href="./login.html"
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

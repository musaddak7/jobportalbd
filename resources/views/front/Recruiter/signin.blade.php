@extends('front.layouts.app')
@section('maincontent')
<section class="section-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5"> 
            <div class="py-lg-5">&nbsp;</div>
            <div class="card shadow border-0 p-5">
                <h1 class="h3">Register</h1>
                <form action="/process-register" name="registrationForm" id="registrationForm" method="POST">
                    @csrf   
                    <div class="mb-3">
                        <label for="name" class="mb-2">Name*</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                    </div> 
                    <div class="mb-3">
                        <label for="email" class="mb-2">Email*</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                    </div> 
                    <div class="mb-3">
                        <label for="password" class="mb-2">Password*</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" id="togglePassword">
                            <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label for="confirm_password" class="mb-2">Confirm Password*</label>
                        <div class="input-group">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Password" required>
                            <button type="button" class="btn btn-outline-secondary toggle-confirm-password" id="toggleConfirmPassword">
                            <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-primary mt-2">Register</button>
                </form>                    
            </div>
            <div class="mt-4 text-center">
                <p>Have an account? <a href="{{route('account.login')}}">Login</a></p>
            </div> 
            <div class="py-lg-5">&nbsp;</div>
        </div>
    </div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var passwordIcon = document.querySelector('#togglePassword i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove('bi bi-eye-slash-fill');
            passwordIcon.classList.add('bi bi-eye-slash-fill');
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove('bi bi-eye-slash-fill');
            passwordIcon.classList.add('bi bi-eye-slash-fill');
        }
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        var confirmPasswordInput = document.getElementById('confirm_password');
        var confirmPasswordIcon = document.querySelector('#toggleConfirmPassword i');

        if (confirmPasswordInput.type === "password") {
            confirmPasswordInput.type = "text";
            confirmPasswordIcon.classList.remove('bi bi-eye-fill');
            confirmPasswordIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordInput.type = "password";
            confirmPasswordIcon.classList.remove('bi bi-eye-fill');
            confirmPasswordIcon.classList.add('fa-eye');
        }
    });
</script>

@endsection

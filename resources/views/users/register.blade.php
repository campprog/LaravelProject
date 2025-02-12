<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<h1 class="text-center mt-5 fw-bold">Register</h1>
<form method="POST" action="/cloud/user" class="card p-4 mt-4 shadow-lg mx-auto" style="max-width: 500px;">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"/>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror        
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email"/>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror        
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password"/>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror        
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"/>
        @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
        @enderror        
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>

    <div class="text-center mt-3">
        <p>Already have an account? <a href="/cloud/login">Login</a></p>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

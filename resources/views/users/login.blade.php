<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<h1 class="text-center mb-4">Login</h1>

<div class="d-flex justify-content-center">
    <form method="POST" action="/cloud/authenticate" class="card p-4" style="width: 100%; max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" />

            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror        
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" />

            @error('password')
                <div class="text-danger">{{$message}}</div>
            @enderror        
        </div>

        <div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </div>

        <div class="mt-3 text-center">
            <p>Don't have an account?</p>
            <a href="/cloud/register" class="btn btn-link">Register</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloud Thoughts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1 class="text-center mb-4">Welcome to Cloud</h1>

    @auth
    <div class="text-end">
        <span class="fw-bold">{{ auth()->user()->name }}</span>
        <form method="POST" action="/logout" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>

    <div class="card p-3 mt-3">
        <form action="/cloud" method="POST">
            @csrf
            <div class="mb-3">
                <label for="thought" class="form-label">Write Your Thought</label>
                <input type="text" name="thought" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="mt-4">
        @foreach($thoughts as $thought)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ $thought->user->name }}</h5>
                <p class="card-text">{{ $thought->thought }}</p>

                <div class="d-flex gap-2">
                    <form method="POST" action="/cloud/{{ $thought->id }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" name="direction" value="up" class="btn btn-success btn-sm">↑</button>
                    </form>

                    <form method="POST" action="/cloud/{{ $thought->id }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" name="direction" value="down" class="btn btn-warning btn-sm">↓</button>
                    </form>

                    <form method="POST" action="/cloud/{{ $thought->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <div class="text-center">
        <a href="/cloud/register" class="btn btn-success">Register</a>
        <a href="/cloud/login" class="btn btn-primary">Login</a>
    </div>

    <div class="mt-4">
        @foreach($thoughts as $thought)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-text">{{ $thought->thought }}</h4>
            </div>
        </div>
        @endforeach
    </div>
    @endauth

   
    <div class="mt-4 d-flex justify-content-center">
        {{ $thoughts->links() }}
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

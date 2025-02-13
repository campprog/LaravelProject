<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4">Alterar Senha</h2>

                <form method="POST" action="/cloud/resetPassword">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Senha Atual</label>
                        <input type="password" name="current_password" class="form-control" required />
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror        
                    </div>

                   
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nova Senha</label>
                        <input type="password" name="new_password" class="form-control" required />
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror        
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required />
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror        
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Alterar Senha</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

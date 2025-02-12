<h1>Register</h1>
<form method="POST" action="/cloud/user">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name"/>
    
        @error('name')
        <p>{{$message}}</p>
        @enderror        
    </div>
    
    <div>
        <label for="email">email</label>
        <input type="email" name="email"/>
    
        @error('email')
        <p>{{$message}}</p>
        @enderror        
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password"/>
    
    @error('password')
        <p>{{$message}}</p>
        @enderror        
    </div>

    <div>
        <label for="password_confirmation">Confirm password</label>
        <input type="password" name="password_confirmation"/>
    
    @error('password_confirmation')
        <p>{{$message}}</p>
        @enderror        
    </div>

<div>
    <button type="submit">Sign Up</button>
</div>

<div>
    <p>Already have an account?</p>
    <a href="/cloud/login">Login</a>
</div>
</form>
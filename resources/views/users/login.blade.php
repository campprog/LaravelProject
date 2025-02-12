<h1>Login</h1>
<form method="POST" action="/cloud/authenticate">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name"/>
    
        @error('name')
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
    <button type="submit">Sign In</button>
</div>

<div>
    <p>Dont have account?</p>
    <a href="/cloud/register">Register</a>
</div>
</form>
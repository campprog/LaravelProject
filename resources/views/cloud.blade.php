<h1>Ola "User"</h1> 
<form action="/cloud"  method="POST">
    @csrf
    <div>
    <label for="Thought">Write Your Thoughts</label>
   <br> <input type="text" name="thought">
   <br> <button type="submit">Submit</button>
</div>  
</form>
    
    @foreach($thoughts as $thought)
    <h2>{{$thought->thought}}</h2>
    @endforeach
    <div>
        {{$thoughts->links()}}
    </div>
    
        
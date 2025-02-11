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

    <form method="POST" action="/cloud/{{$thought->id}}">
    @csrf
    @method('PATCH')
    <button type="submit" name="direction" value="up">↑</button>
    </form>


    <form method="POST" action="/cloud/{{$thought->id}}">
    @csrf
    @method('PATCH')
    <button type="submit" name="direction" value="down">↓</button>
    </form>
        
    <form method="POST" action="/cloud/{{$thought->id}}">
    @csrf
    @method('DELETE')
    <button>X</button>
    </form>

    @endforeach

    <div>
        {{$thoughts->links()}}
    </div>
    
        
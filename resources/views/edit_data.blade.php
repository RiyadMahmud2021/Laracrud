<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body> 
    <div class="container p-5"> 

        <form action="{{url('/editData/'.$dataRow->id)}}" method="POST" class="form">
            @csrf <!--  why csrf??? -->
            Name: <input class='form-control' type="text" name="name"  id="name" value="{{$dataRow->name}}"> 
            
            @error('name')
            <span class='text-danger'>{{$message}}</span>
            @enderror 
            
                <br/>  <br/>
            
            Email: <input class='form-control' type="text" name="email" value="{{$dataRow->email}}">
            
            @error('email')
            <span class='text-danger'>{{$message}}</span> <!-- // default and custom msg setting   -->
            @enderror 
            
                <br/>  <br/>
        
            <div class="text-center">     
                <input class='btn btn-success' type="submit" name="postSubmit" value="Submit">       
            </div>
        
        </form>
            
    </div>
</body>
</html>




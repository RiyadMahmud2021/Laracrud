<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>
    <body> 
    
        <section class="container"> 
            <div class="row"> 
                <div class="col-md-12 p-5"> 
                
                    @if(Session::has('msg'))
                            <div class="alert alert-success">
                                <h5>{{Session::get('msg')}}</h5>
                            </div>
                    @endif
                    @if(Session::has('msg_u'))
                            <div class="alert alert-success">
                                <h5>{{Session::get('msg_u')}}</h5>
                            </div>
                    @endif

                    @if(Session::has('msg_d'))
                            <div class="alert alert-success">
                                <h5>{{Session::get('msg_d')}}</h5>
                            </div>
                    @endif
                <table class="table table-bordered">
                        <thead >
                            <tr  class="text-center ">
                                <th class="border  ">ID</th>
                                <th class="border  ">Name</th>
                                <th class="border  ">Email</th>
                                <th class="border  ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($showData))
                                @foreach($showData as $row)
                                <tr>
                                    <td class="border "> {{$row->id}}    </td>
                                    <td class="border "> {{$row->name}}  </td>
                                    <td class="border "> {{$row->email}} </td>
                                    <td class="border  text-center">
                                        <a class="btn btn-light" href=""> View </a>
                                        <a class="btn btn-warning " href="{{url('/editDataPage/'.$row->id)}}"> Edit </a>
                                        <a class="btn btn-danger" href="{{url('/deleteData/'.$row->id)}}" onClick= "return confirm('Are you suru to delete?')">Delete</a>  
                                    </td> 
                                </tr>
                                @endforeach 
                            @endif
                        </tbody>
                </table>
                {{$showData->links()}}
                <div class="text-center">
                    <a class="btn btn-success text-center" href="{{url('/add_data')}}" >Add </a>  
                    <!-- this button is not submit button but it change url and go to new url (its a lin button and took to the other link)-->
                </div>
            </div>
        
        </div>
        

        </section>

    </body>
</html>
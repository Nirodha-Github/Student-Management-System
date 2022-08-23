<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard </title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="_token" content="{{csrf_token()}}">
    </head>
    <body>

        <nav class="navbar bg-dark nav-dark">
            <div class="container-fluid">
                <h2 class="navbar-brand text-white">Admin Dashboard</h2>
                <a role="button" class="btn btn-warning" href="home">Back To Home</a>
            </div> 
            <hr>
        </nav>

        <div class="container p-1 mt-3">
            <div class="row mt-3">
                <div class="card col-sm-12">
                    <h4 class="card-header text-dark">
                        Assign Students To Courses
                    </h4>
                    <div class="card-body">                     
                        <form method="post" id="form" name="form" action="{{route('assign-students')}}">
                            @if(Session::has('success'))
                            <div class="alert alert-dark">{{ Session::get('success') }}</div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="studentName" class="form-label">Student Name</label>
                                <select class="form-select form-select-sm" name="student_id" id="studentName" aria-label=".form-select-sm">
                                    @if($students){
                                        <option selected>Select Student Name</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                    }
                                    @else{
                                        <option value="" selected>No students data to select</option>             
                                    }
                                    @endif
                                </select>
                                @if($errors->has('name'))
                                    <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <select class="form-select form-select-sm" name="category_id" id="categoryName" aria-label=".form-select-sm">
                                    @if($categories){
                                        <option selected>Select Category Name</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    }
                                    @else{
                                        <option selected>{{$message}}</option>             
                                    }
                                    @endif
                                </select>
            
                            </div>
                            <div class="mb-3">
                                <label for="courseName" class="form-label">Course Name</label>
                                <select class="form-select form-select-sm" name="course_id" id="courseName" aria-label=".form-select-sm">
                                    
                                </select>  
                                @if($errors->has('course_id'))
                                    <p class="text-danger">{{$errors->first('course_id')}}</p>
                                @endif                  
                            </div>
                            <button type="submit" class="btn btn-dark">Assign students</button>
                        </form>
                    </div>
                </div>
            </div>
        
        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
   $.ajaxSetup({
       headers:{
           'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
       }
   });

   $(document).ready(function(){
       $("#categoryName").change(function(){
            var category_id = $(this).val();

            if(category_id == ""){
                var category_id=0;

            }
            $.ajax({
                url:'{{ url("assign-students/")}}/'+category_id,
                type:'post',    
                dataType:'json',
                success:function(response){
                    //$('#courseName').find('option:not(:first)').remove();
                    $('#courseName').empty();
                    if(response['courses'].length > 0){
                        $.each(response['courses'],function(key,value){
                            console.log(value);
                            $("#courseName").append("<option value='"+value['id']+"'>"+value['name']+"</option>")
                        })
                    }
                    else{
                        $("#courseName").append("<option selected>Courses Not Found</option>")
                    }
                   
                }
            });
         
       });
   });

//    $("#form").submit(function(event)){
//        event.preventDefault();
//        $.ajax({
//                 url:'{{ url("/save")}}',
//                 type:'post',
//                 data:$("#form").serializeArray(),    
//                 dataType:'json',
//                 success:function(response){
                    
//                 }
//             });
//    })

 
</script>
<script src="{{asset('js/app.js')}}"></script>
    
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
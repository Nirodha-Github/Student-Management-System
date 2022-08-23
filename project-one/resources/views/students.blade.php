@include('components/header')

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
            <h4 class="card-header text-success">
                Add Students
            </h4>
            <div class="card-body">
                <form method="post"  action="{{route('add-student')}}">  
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @csrf
                    <div class="mb-4">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" name="name" placeholder="Enter Student Name" class="form-control" id="studentName">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" name="phoneNo" placeholder="Enter Phone Number" class="form-control" id="phoneNumber">
                        @if($errors->has('phoneNo'))
                            <p class="text-danger">{{$errors->first('phoneNo')}}</p>
                        @endif
                    </div> 
                        
                    <button type="submit" name="addStudent" class="btn btn-success">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components/footer')
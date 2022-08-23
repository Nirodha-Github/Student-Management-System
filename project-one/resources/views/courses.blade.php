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
            <h4 class="card-header text-secondary">
                Add courses
            </h4>
            <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-secondary">{{ Session::get('success') }}</div>
                    @endif
                <form method="post"  action="{{route('add-course')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="courseName" class="form-label">course Name</label>
                        <input type="text" name="name" placeholder="Enter course Name" class="form-control" id="courseName">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif   
                    </div>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <select class="form-select" name="category_id" id="categoryName" aria-label=".form-select-sm">
                            @if($categories){
                                <option selected>Select Category Name</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            }
                            @else{
                                <option value="" selected>No category data to select</option>             
                            }
                            @endif
                        </select>

                        @if($errors->has('category_id'))
                            <p class="text-danger">{{$errors->first('category_id')}}</p>
                        @endif

                    </div>
                    <button type="submit" class="btn btn-secondary">Add course</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components/footer')
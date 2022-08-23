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
            <h4 class="text-primary card-header">
                Add Categories
            </h4>
            <div class="card-body">
                
                <form method="post" action="{{route('add-category')}}">
                    @if(Session::has('success'))
                        <div class="alert alert-primary">{{ Session::get('success') }}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Sub Category Name</label>
                        <input type="text" name="name" placeholder="Enter Category Name" class="form-control" id="categoryName">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="parent" class="form-label">Main Category Name</label>
                        <select class="form-select" id="parent" name="main_id" aria-label="Default select">
                        
                            @if(count($categories)!=0){
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
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>

</div>

@include('components/footer')
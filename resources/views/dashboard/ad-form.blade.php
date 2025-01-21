@include('layout.styles')
<div class="container mt-5">
    
    <h2>Post Your AD</h2>
    <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Post Your AD</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" placeholder="{{$categoryName}}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>category</label>
                                <select name="chaild" class="form-control">
                                    @foreach($chaildCategories as $chaild)
                                    <option  value="{{$chaild->id}}">{{$chaild->name}}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>AD name</label>
                                <input type="text" class="form-control" placeholder="enter your Ad title" name="AdName">
                               
                            </div>
                            @error('AdName')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Your Address</label>
                                <input type="text" class="form-control" placeholder="enter your Ad title" name="address">
                            </div>
                            @error('address')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror
                        </div>



                        

                        <div class="row">

                           
                            
                        </div>
                    </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter description for your Ad"></textarea>
                                </div>
                                @error('description')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror

                            </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="images" class="form-label">Select Images</label>
                            <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*">
                        </div>
                        @error('images')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror
                    </div>
                    <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Price:</label>
                                    <input type="text"  name="price" step="0.01" min="0" class="form-control" placeholder="Enter price">
                                </div>
                                @error('price')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                    
            </div>
            @csrf
    </form>
    
</div>
@include('layout.scripts')
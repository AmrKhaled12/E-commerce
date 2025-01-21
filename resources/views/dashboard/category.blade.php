@include('layout.styles')
<div class="container mt-5">
              <div class="card-header">
                <h3 class="card card-dark">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('create-category')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Category name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Category name">
                                @error('name')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">sub categories</label>
                    <input type="text" name="chaildren" class="form-control" placeholder="Enter categories separated by commas" />

                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                              
                    </div>
                    @error('image')
                                 <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                 </div>
                                @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
</div>
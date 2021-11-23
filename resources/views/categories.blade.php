<x-header/>
<x-navbar/>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4" style="padding:20px;">
                            <h5 class="float-left">Category list</h5>
                            <button class="btn btn-sm btn-primary float-right add_btn">Add</button>
                            <table class="table">
                                <thead  style=" display:block;">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody class="auto-scroll">
                                @if(count($categories) != 0)
                                    @for($x = 0;$x < count($categories);$x++)
                                    <tr>
                                        <td class="cat_name_elipsis">{{$categories[$x]->name}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm float-left edit_btn" 
                                            category_no_of_posts="{{$categories[$x]->no_of_posts}}" category_name="{{$categories[$x]->name}}" category_id="{{$categories[$x]->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            @if($categories[$x]->no_of_posts == 0)
                                                <button class="btn btn-primary btn-sm float-right ml5 delete_btn"
                                                category_name="{{$categories[$x]->name}}" category_id="{{$categories[$x]->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endfor
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <div class="form-design" id="add_cat_form">
                                <h5>Add Category</h5>
                                <form method="POST" action="/category/create_catagory" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="text" class="form-control {{$errors->first('category_name') ? 'error_style' : ''}}" name="category_name" placeholder="Category">
                                        @if($errors->first('category_name'))
                                            <span style="color:red;">{{$errors->first('category_name')}}</span>
                                        @endif
                                    </div>
                                    <br/>
                                    <button type="submit" name="save_category_btn" class="btn btn-primary form-control">Save Category</button>
                                </form>
                            </div>
                            <div class="form-design hide_element" id="edit_cat_form">
                                <div class="alert alert-warning category_warning">
                                    Category has <strong class="number_of_posts"></strong> posts attached to it.
                                </div>
                                <h5>Edit Category</h5>
                                <form method="POST" action="/category/update_category" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                    <div class="alert alert-danger hide_element edit_category_empty">
                                        Category name is empty
                                    </div>
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="text" class="form-control {{$errors->first('category_name') ? 'error_style' : ''}} category_name" id="edit_category_name" name="category_name" placeholder="Category">
                                        @if($errors->first('category_name'))
                                            <span style="color:red;">{{$errors->first('category_name')}}</span>
                                        @endif
                                    </div>
                                    <input type="hidden" class="category_id" name="category_id">
                                    <br/>
                                    <button type="submit" id="update_category_btn" name="update_category_btn" class="btn btn-primary form-control">Update Category</button>
                                </form>
                            </div>
                            <div class="form-design hide_element" id="delete_cat_form">
                                <form method="POST" action="/category/delete_category" enctype="multipart/form-data"> 
                                    <h5 class="text-center">Delete this <strong class="category_title"> </strong> category?</h5>
                                    {{ csrf_field() }}
                                    <input type="hidden" class="category_id" name="category_id">
                                    <button type="submit" name="yes_delete_btn" class="btn btn-primary float-left">Yes, Delete it</button>
                                    <button type="button" class="btn btn-default float-right cancel_delete_btn">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
<x-footer/>
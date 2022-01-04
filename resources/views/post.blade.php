<x-header/>
<x-navbar/>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8 align-self-start">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Contact Us header-->
                            <header class="mb-8">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">Create a new blog entry</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-3">Express your mind!</div>
                            </header>
                            <!-- Post content-->

                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('success_message') }}
                                </div>
                            @endif
                            <section class="mb-5">
                                <form method="POST" action="/post/create" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="mb-1">Title</label>
                                        <input type="text" name="blog_title_txt" class="form-control mb-1 {{$errors->first('blog_title_txt') ? 'error_style' : ''}}">
                                        @if($errors->first('blog_title_txt'))
                                            <span style="color:red;">{{$errors->first('blog_title_txt')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="mb-1">Description</label>
                                        <textarea class="form-control mb-1 {{$errors->first('blog_description_txt') ? 'error_style' : ''}}" name="blog_description_txt" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        @if($errors->first('blog_description_txt'))
                                            <span style="color:red;">{{$errors->first('blog_description_txt')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="mb-1">Content</label>
                                        <textarea class="form-control mb-1 {{$errors->first('blog_content_txt') ? 'error_style' : ''}}" name="blog_content_txt" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        @if($errors->first('blog_content_txt'))
                                            <span style="color:red;">{{$errors->first('blog_content_txt')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 mt-3">Categories
                                            @if($errors->first('blog_category_txt'))
                                                <span style="color:red;">{{$errors->first('blog_category_txt')}}</span>
                                            @endif
                                        </label>
                                        <div class="row">
                                        @for ($i = 0; $i < count($categories); $i++)
                                            @if ($i <= 3)
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="blog_category_txt[]" value="{{$categories[$i]->id}}" type="checkbox">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{$categories[$i]->name}}
                                                    </label>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="blog_category_txt[]" value="{{$categories[$i]->id}}" type="checkbox">
                                                    <label class="form-check-label" for="defaultCheck4">
                                                        {{$categories[$i]->name}}
                                                    </label>
                                                </div>
                                            </div>
                                            @endif
                                        @endfor
                                        </div>
                                    </div>
                                    <button type="submit" name="save_blog_btn" class="btn btn-primary mt-5">Post</button>
                                </form>
                            </section>
                        </div>
                        <div class="col-lg-4"></div>
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
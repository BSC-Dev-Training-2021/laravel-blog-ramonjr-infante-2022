<x-header/>
<x-navbar/>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$blog[0]->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{$blog[0]->created_at}} by {{$blog[0]->name}}</div>
                            <!-- Post categories-->
                            @for($x = 0;$x < count($blog[0]->categories);$x++)
                                <a class="badge bg-secondary text-decoration-none link-light" href="#{{$blog[0]->categories[$x]->category_id}}">{{$blog[0]->categories[$x]->name}}</a>
                            @endfor
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            {!! nl2br(e($blog[0]->content))!!}
                        </section>
                    </article>
                    <!-- Comments section-->

                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4" method="POST" action="/article/insert_comment/{{$blog[0]->id}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div>
                                        @if($errors->first('blog_comment_txt'))
                                            <span style="color:red;">{{$errors->first('blog_comment_txt')}}</span>
                                        @endif
                                        <textarea class="form-control mb-2 {{$errors->first('blog_comment_txt') ? 'error_style' : ''}}" name="blog_comment_txt" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" name="comment_btn" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </form>
                                <!-- Single comment-->
                                @if(count($blog[0]['comments']) != 0)
                                    @for($x = 0;$x < count($blog[0]['comments']);$x++)
                                        <div class="d-flex">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">{{$blog[0]['comments'][$x]['name']}}</div>
                                                <p>{{$blog[0]['comments'][$x]['comment']}}</p>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </section>
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
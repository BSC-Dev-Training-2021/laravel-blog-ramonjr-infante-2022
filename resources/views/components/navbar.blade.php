
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link {{ Request::path() ==  '/' ? 'active' : ''  }}" href="/index">Home</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::path() ==  'about' ? 'active' : ''  }}" href="/about">About</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::path() ==  'contact' ? 'active' : ''  }}" href="/contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::path() ==  'post' ? 'active' : ''  }}" href="/post">Post</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::path() ==  'messages' ? 'active' : ''  }}" href="/messages"><i class="fa fa-envelope-o"></i></a></li>
                        <li class="nav-item dropdown">
                        <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="/categories">Categories</a></li>
                                <li><a class="dropdown-item" href="#">Users</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>

                
                </div>
            </div>
        </nav>
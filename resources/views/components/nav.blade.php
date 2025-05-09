<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navigation bar</title>

    <style>
      .nav-item {
        padding: 0.5rem 0xp;
      }
      
      .dropdown-hover:hover>.dropdown-menu {
      display: inline-block;
      }
      
      .dropdown-hover>.dropdown-toggle:active {
      /*Without this, clicking will make it sticky*/
      pointer-events: none;
      }
      </style>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
          <a class="navbar-brand" href="{{ route('home') }}">Web Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex" action="{{ route('show.login') }}" method="GET">
                  <button class="btn btn-outline-dark" type="submit">
                      Login
                  </button>
                </form> 


                <form class="d-flex" action="{{ route('show.register') }}" method="GET">
                  <button class="btn btn-outline-dark" type="submit">
                      Register
                  </button>
                </form> 

                <form class="d-flex" action="{{ route('create') }}" method="GET">
                  <button class="btn btn-outline-dark" type="submit">
                      Create new product
                  </button>
                </form>              
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>




    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 0px;">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button data-mdb-button-init class="navbar-toggler px-0" type="button" data-mdb-collapse-init
            data-mdb-target="#navbarExampleOnHover" aria-controls="navbarExampleOnHover" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarExampleOnHover">
            <!-- Left links -->
            <ul class="navbar-nav me-auto ps-lg-0" style="padding-left: 0.15rem">
              <!-- Navbar dropdown -->
              <li class="nav-item dropdown dropdown-hover position-static">
                <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-mdb-toggle="dropdown" aria-expanded="false">
                  Mega menu
                </a>
                <!-- Dropdown menu -->
                <div class="dropdown-menu w-100 mt-0" aria-labelledby="navbarDropdown" style="border-top-left-radius: 0;
                                  border-top-right-radius: 0;
                                ">
      
                  <div class="container">
                    <div class="row my-4">
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="list-group list-group-flush">
                          <a href="" class="list-group-item list-group-item-action">Lorem ipsum</a>
                          <a href="" class="list-group-item list-group-item-action">Dolor sit</a>
                          <a href="" class="list-group-item list-group-item-action">Amet consectetur</a>
                          <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                          <a href="" class="list-group-item list-group-item-action">Adipisicing elit</a>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="list-group list-group-flush">
                          <a href="" class="list-group-item list-group-item-action">Explicabo voluptas</a>
                          <a href="" class="list-group-item list-group-item-action">Perspiciatis quo</a>
                          <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                          <a href="" class="list-group-item list-group-item-action">Laudantium maiores</a>
                          <a href="" class="list-group-item list-group-item-action">Provident dolor</a>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                        <div class="list-group list-group-flush">
                          <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                          <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                          <a href="" class="list-group-item list-group-item-action">Est iure</a>
                          <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                          <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="list-group list-group-flush">
                          <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                          <a href="" class="list-group-item list-group-item-action">Saepe</a>
                          <a href="" class="list-group-item list-group-item-action">Vel alias</a>
                          <a href="" class="list-group-item list-group-item-action">Sunt doloribus</a>
                          <a href="" class="list-group-item list-group-item-action">Cum dolores</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
      @if (session('success'))
        <div id="flash" class="alert alert-success text-center fw-bold" role="alert">
          {{ session('success') }}
        </div>
      @endif    


</body>
</html>
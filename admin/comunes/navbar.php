<!-- Custom styles for this template -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- cdn icnonos-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<nav class="navbar bg-black text-dark fixed-top">
  <div class="container-fluid">
    <h2 class="text-dark">Sena</h2>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon bi-chevron-bar-down"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="dropdown-item" href="index.php">Inicio</a>
          </li>
          <hr style="color: blue;" width="50%">
          <li class="nav-item">
            <a class="dropdown-item" href="registro.php">Registrar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="dropdown-item" href="historial.php">Historial de registros</a>
          </li>
          <li class="nav-item">
            <a class="dropdown-item" href="perfil.php">Perfil</a>
          </li>
          <br><br>
            <form class="d-flex" role="search" method="POST">
              <button type="submit" value="Cerrar sesión" name="btncerrar" class="btn btn-primary">
                Cerrar Sesión
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<br><br><br>




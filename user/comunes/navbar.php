<nav class="navbar nav p-1 text-dark fixed-top bg-white">
    <div class="pt-1">
        <h4 class="navbar text-dark">Sena</h4>
    </div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ingreso
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="usuarios.php">Usuarios</a></li>
            <li><a class="dropdown-item" href="salida.php">Elementos de salida</a></li>
            <li><a class="dropdown-item" href="registros.php">Registros</a></li>
          </ul>
        </li>
        <li> 
          <form class="d-flex" role="search" method="POST">
            <input class="btn btn-outline-dark" type="submit" value="Cerrar sesión" name="btncerrar" />
          </form>
        </li>
    </ul>
</nav>
<br><br><br>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- inicio alerta -->
    <!-- alerta falta -->
    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Rellena todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?>
    <!-- fin alerta falta -->

    <!-- alerta registrado -->
    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!</strong> Se agregaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?> 
    <!-- fin alerta registrado -->
    
    <!-- alerta editado -->
    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exitoso!,</strong> Se editaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?> 
    <!-- fin alerta editado -->

    <!-- alerta editado -->
    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exitoso!,</strong> Se eliminaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?> 
    <!-- fin alerta editado -->
    
    <!-- alerta de error -->
    <?php 
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?>     
    <!-- fin alerta de error -->
<!-- fin alerta --> 
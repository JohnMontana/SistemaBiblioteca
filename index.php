<?php  

    session_start();
    if(isset($_SESSION['user'])){
       if($_SESSION['user']['tipo']!=1){
            header('Location: login.php');
        }else if($_SESSION['user']['tipo']==2){
            header('Location: Gerente/');
        } else if($_SESSION['user']['tipo']==3){
            header('Location: Vendedor/');
        }
    } else {
      header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistema Biblioteca</title>
    <link type="image/x-icon" href="img/logo2.png" rel="icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</head>

<body>
    <header>
        <div class="cabecera dropdown">
            <a href="index.html"><img src="img/logo.png" alt=""></a>
            <i class="fa fa-user-circle dropdown-toggle" aria-hidden="true" data-toggle="dropdown"></i>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><h1><?php echo $_SESSION['user']['usuario'] ?></h1></a>
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="php/salir.php">Salir</a>
              </div>
        </div>
        
        <div class="ui right demo sidebar vertical inverted menu uncover visible" style="">
            <a class="header item">
                <h3>Menu</h3>
            </a>
            <a class="item" id="libros"><i class="fa fa-book fa-2x" aria-hidden="true"></i> <p>Libros</p></a>
            <a class="item libros sub-item" id="registrarLibro"><i class="fa fa-plus fa-2x" aria-hidden="true"></i> <p>Registrar Libros</p></a>
            <a class="item libros sub-item" id="ModificarLibro"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i> <p>Modificar Libro</p></a>
            <a class="item" id="prestamos" id="Prestamos"><i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i><p>Prestamos</p></a>
            <a class="item prestamos sub-item" id="NuevoPrestamo"><i class="fa fa-plus fa-2x" aria-hidden="true"></i> <p>Nuevo Prestamo</p></a>
            <a class="item prestamos sub-item" id="ModificarPrestamo"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i> <p>Modificar Prestamo</p></a>
            <a class="item" id="consultas"><i class="fa fa-search fa-2x" aria-hidden="true"></i><p>Consultas</p></a>
            <a class="item consultas sub-item" id="Consultaslibros"><i class="fa fa-book fa-2x" aria-hidden="true"></i> <p>Libros</p></a>
            <a class="item consultas sub-item" id="Consultasprestamos"><i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i><p>Prestamos</p></a>
            <a class="item" id="Estadisticas">
                <p><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i>Estadisticas</p>
            </a>
            <a class="item" id="Imprimir">
                <p><i class="fa fa-print fa-2x" aria-hidden="true"></i>Imprimir</p>
            </a>
            <a class="item" id="usuarios">
                <p><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>Usuarios</p>
            </a>
            <a class="item usuarios sub-item" id="AgreUsu">
                <p><i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>Agregar Usuario</p>
            </a>
            <a class="item usuarios sub-item" id="MoUsu"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i> <p>Modificar Usuario</p></a>

        </div>
    </header>

    <section class="main">
        <div class="container-fluid">
            <div class="row mostrar" id="ReUsu">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Registrar Usuarios</h1>
                            <form id="FoUsu">
                                <div class="row">
                                    <div class="form-group col-md-4 offset-md-4">
                                        <select class="form-control" id="UsuTipo" name="usuario" required>
                            <option value="">-- Selecciona el tipo de usuario --</option>
                            <option value="Maestro">Maestro</option>
                            <option value="Alumno">Alumno</option>
                            <option value="Administrativos">Administrativo</option>
                          </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="UsuNombre">Nombre:</label>
                                        <input type="text" class="form-control" id="UsuNombre" name="nombre" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="UsuApPat">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="UsuApPat" name="apellidoPaterno" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="UsuApMat">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="UsuApMat" name="apellidoMaterno" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="UsuNoC">No. de Control:</label>
                                        <input type="number" class="form-control" id="UsuNoc" name="numControl" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="UsuCa">Carrera:</label>
                                        <select class="form-control" id="UsuCa" name="carrera">
                            <option value="seleccione">Seleccione...</option>
                                  <option value="1">Ing. Sistemas Computacionales</option>
                                  <option value="2">Ing. Gestion Empresarial</option>
                                  <option value="3">Ing. Industrial</option>
                                  <option value="4">Ing. Industrias Alimentarias</option>
                                  <option value="5">Ing. Electromecanica</option>
                                  <option value="6">Ing. Ambiental</option>
                          </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-success btn-block btn-lg">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mostrar" id="agregarLibro">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Agregar Libro</h1>
                            <form action="" id="formLibro">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="idLibro">ID Libro</label>
                                        <input type="text" class="form-control" name="idLibro" id="idLibro">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="isbn">ISBN</label>
                                        <input type="text" class="form-control" name="isbn" id="isbn">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="codigoBarras">Codigo de Barras</label>
                                        <input type="text" class="form-control" name="codigoBarras" id="codigoBarras">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="autor">Autor</label>
                                        <input type="text" class="form-control" name="autor" id="autor">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tituloOriginal">Titulo Original</label>
                                        <input type="text" class="form-control" name="tituloOriginal" id="tituloOrignal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="anioEdicion">Año de Edicion</label>
                                        <input type="number" class="form-control" name="anioEdicion" id="anioEdicion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lugarEdicion">Lugar de Edicion</label>
                                        <input type="text" class="form-control" name="lugarEdicion" id="lugarEdicion">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="editorial">Editorial</label>
                                        <input type="text" class="form-control" name="editorial" id="editorial">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="paginas">Paginas</label>
                                        <input type="number" class="form-control" name="paginas" id="paginas">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ubicacion">Ubicacion</label>
                                        <input type="text" class="form-control" name="ubicacion" id="ubicacion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="volumen">Volumen</label>
                                        <input type="number" class="form-control" name="volumen" id="volumen">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="numSerie">Numero de Serie</label>
                                        <input type="text" class="form-control" name="numSerie" id="numSerie">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="carrera">Carrera</label>
                                        <select name="carrera" id="carrera" class="form-control">
                                            <option value="seleccione">Seleccione...</option>
                                            <option value="1">Ing. Sistemas Computacionales</option>
                                            <option value="2">Ing. Gestion Empresarial</option>
                                            <option value="3">Ing. Industrial</option>
                                            <option value="4">Ing. Industrias Alimentarias</option>
                                            <option value="5">Ing. Electromecanica</option>
                                            <option value="6">Ing. Ambiental</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="url">Url</label>
                                        <input type="url" class="form-control" name="url" id="url">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="temaGeneral">Tema General</label>
                                        <input type="text" class="form-control" name="temaGeneral" id="temaGeneral">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="temaEspecifico">Tema Especifico</label>
                                        <input type="text" class="form-control" name="temaEspecifico" id="temaEspecifico">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success btn-lg" id="btnAgregarLibro"><i class="fa fa-floppy-o" aria-hidden="true" ></i> Agregar Libro</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mostrar" id="VerUsu">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                            <input class="form-control input-lg" type="text" id="BusUsu" placeholder="Buscar ususarios">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="TaEn">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Tipo</th>
                                        <th>No. Control</th>
                                        <th>Carrera</th>
                                        <th>Fecha de registro</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mostrar" id="TablaLibros">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                            <input class="form-control input-lg" type="text" id="BuscaLibro" placeholder="Buscar libros">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="TLibros">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ISBN</th>
                                        <th>Código Barras</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Título Original</th>
                                        <th>Año Edición</th>
                                        <th>Lugar Edición</th>
                                        <th>Editorial</th>
                                        <th>Páginas</th>
                                        <th>Ubicación</th>
                                        <th>Volúmen</th>
                                        <th>N° Serie</th>
                                        <th>Carrera</th>
                                        <th>URL</th>
                                        <th>Tema Gral</th>
                                        <th>Tema Esp</th>
                                    </tr>
                                </thead>
                                <tbody id="datos">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/agregarLibro.js"></script>
    <script src="js/usuarios.js"></script>
    <script src="js/login.js"></script>
    <script>
        $('#FoUsu').serializeArray();
    </script>
</body>

</html>
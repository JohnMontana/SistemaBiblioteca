<div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Agregar Libro</h1>
                            <form action="" id="formLibro">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="isbn">ISBN</label>
                                        <input type="text" class="form-control" name="isbn" id="isbn" require>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="codigoBarras">Codigo de Barras</label>
                                        <input type="text" class="form-control" name="codigoBarras" id="codigoBarras" require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo" require>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="autor">Autor</label>
                                        <input type="text" class="form-control" name="autor" id="autor" require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tituloOriginal">Titulo Original</label>
                                        <input type="text" class="form-control" name="tituloOriginal" id="tituloOrignal" require>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="anioEdicion">Año de Edicion</label>
                                        <input type="number" class="form-control" name="anioEdicion" id="anioEdicion" require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lugarEdicion">Lugar de Edicion</label>
                                        <input type="text" class="form-control" name="lugarEdicion" id="lugarEdicion" require>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="editorial">Editorial</label>
                                        <input type="text" class="form-control" name="editorial" id="editorial" require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="paginas">Paginas</label>
                                        <input type="number" class="form-control" name="paginas" id="paginas" require>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ubicacion">Ubicacion</label>
                                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="volumen">Volumen</label>
                                        <input type="number" class="form-control" name="volumen" id="volumen" require>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="numSerie">Numero de Serie</label>
                                        <input type="text" class="form-control" name="numSerie" id="numSerie" require>
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
                                        <select name="temaGeneral" id="temaGeneral" class="form-control">
                                            <option value="seleccione">Seleccione...</option>
                                            <option value="1">Fisica</option>
                                            <option value="2">Quimica</option>
                                            <option value="3">Programacion</option>
                                            <option value="4">Matematicas</option>
                                            <option value="5">Literatura</option>
                                            <option value="6">Ingles</option>
                                        </select>
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
<main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://fideslaw.ec/wp-content/uploads/2017/01/familia-banner.jpg" class="d-block w-100" alt="...">
                <h1 class="banner-titulo">Convierte tu apartamento en el mejor espacio para otros</h1>
                <h3 class="banner-parrafo">Se el mejor anfitrión</h3>
                <!-- Button trigger modal -->
                <button type="button" class="banner-btn" data-bs-toggle="modal" data-bs-target="#registroApto">
                    Ingresa tu apartamento
                </button>
                <!-- Modal -->
                <div class="modal fade" id="registroApto" tabindex="-1" aria-labelledby="registroApto" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="Registrar Apartamento">Registrar Apartamento</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--  -->
                                <form action="<?php echo base_url() . '/registroApto' ?>" method="POST" class="form registro" onsubmit="return registerApto()">
                                    <input class="ciudad" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required>
                                    <input class="pais" type="text" name="pais" id="pais" placeholder="País" required>
                                    <input class="direccion" type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                                    <input class="ubicacion" type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación en Google Maps" required>
                                    <input class="habitaciones" type="text" name="habitaciones" id="habitaciones" placeholder="Número de Habitaciones" required>
                                    <input class="valor" type="text" name="valor" id="valor" placeholder="Valor por Noche" required>
                                    <input class="resena" type="text" name="resena" id="resena" placeholder="Reseña del Apartamento">
                                    <input class="imagen" type="text" name="imagen" id="imagen" placeholder="Agregue la URL de la Imagen">
                                    <span id="warning" class="text-danger mt-3"></span>
                                    <button type="submit" class="btn-login">Registrar Apartamento</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="m-5 text-center texto">Mis Apartamentos</h2>
    <div class="container">
        
        <?php if ($aparments === array()) {
            echo "<h5>No tienes apartamentos registrados</h5>";
        } ?> <?php if ($aparments !== array()) {
                    echo " <div class='row row-cols-1 row-cols-md-3 g-4'>";
                }
                ?>
        <?php
        foreach ($aparments as $aparment) : ?>

            <?php $updateRoute = base_url() . "/updateApto?id={$aparment['id_apartamentos']}"; ?>
            <?php $deleteRoute = base_url() . "/deleteApto?id={$aparment['id_apartamentos']}"; ?>

            <div class='col mt-5'>
                <div class='card'>
                    <img src=<?php echo $aparment['imagen_destacada'] ?> class='card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>
                            <?php echo $aparment['ciudad'] . ' - ' . $aparment['pais'] ?>
                        </h5>
                        <p class='m-0'> <strong>Dirección:</strong> <?php echo $aparment['direccion'] ?></p>
                        <p class='m-0'> <strong>Habitaciones:</strong> <?php echo $aparment['numero_habitaciones'] ?></p>
                        <p> <strong>Reseña:</strong> <?php echo $aparment['resena'] ?></p>
                        <h5 class='text-end mb-4'>
                            <?php echo $aparment['valor_noche'] ?> COP/noche
                        </h5>
                        <div style="margin:5px auto;">
                            <center>
                                <?php echo $aparment['dir_google_maps'] ?>
                            </center>
                        </div>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?php echo $aparment['id_apartamentos'] ?>">
                            Editar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="update<?php echo $aparment['id_apartamentos'] ?>" tabindex="-1" aria-labelledby="updateApto" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title" id="Registrar Apartamento">Editar Apartamento</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <!-- <?php var_dump($aparment['id_apartamentos'])  ?> -->
                                        <form action="<?php echo $updateRoute ?>" method="POST" class="form registro" onsubmit="return registerApto()">
                                            <input class="ciudad" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" value='<?php echo $aparment['ciudad'] ?>' required>
                                            <input class="pais" type="text" name="pais" id="pais" placeholder="País" value=<?php echo $aparment['pais'] ?> required>
                                            <input class="direccion" type="text" name="direccion" id="direccion" placeholder="Dirección" value='<?php echo $aparment['direccion'] ?>' required>
                                            <input class="ubicacion" type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación en Google Maps"
                                            value='<?php echo $aparment['dir_google_maps'] ?>' required>
                                            <input class="habitaciones" type="text" name="habitaciones" id="habitaciones" placeholder="Número de Habitaciones" value=<?php echo $aparment['numero_habitaciones'] ?> required>
                                            <input class="valor" type="text" name="valor" id="valor" placeholder="Valor por Noche" value=<?php echo $aparment['valor_noche'] ?> required>
                                            <input class="resena" type="text" name="resena" id="resena" value='<?php echo $aparment['resena'] ?>' placeholder="Reseña del Apartamento" rows="1">
                                            <input class="imagen" type="text" name="imagen" id="imagen" placeholder="Agregue la URL de la Imagen" value=<?php echo $aparment['imagen_destacada'] ?>>
                                            <span id="warning" class="text-danger mt-3"></span>
                                            <button type="submit" class="btn-login" name="updateButton">Actualizar Apartamento</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href='<?php echo $deleteRoute ?>' class='btn btn-danger'>Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    </div>
</main>
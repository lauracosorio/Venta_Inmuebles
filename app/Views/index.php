<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/index.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>Alquiler de Inmuebles</title>
</head>

<body>
	<header class="header">
		<h1 class="alquila">Alquila</h1>
		<ul class="header-menu">
			<li>
				<!-- Button trigger modal -->
				<button type="button" class="header-menu-button" data-bs-toggle="modal" data-bs-target="#iniciarSesion">
					Iniciar Sesión
				</button>

				<!-- Modal -->
				<div class="modal fade" id="iniciarSesion" tabindex="-1" aria-labelledby="iniciarSesion" aria-hidden="true" data-backdrop="static">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<p class="modal-title" id="iniciarSesion">Iniciar Sesión</p>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<!--  -->
								<form action="<?php echo base_url() . '/signIn' ?>" method="POST" class="form" onsubmit="return validationLogin(event)">
									<input class="email" type="email" name="email" id="emailLogin" placeholder="Correo Electrónico" required>
									<input class="password" type="password" name="password" id="passwordLogin" placeholder="Contraseña" required>
									<span id="warning" class="text-danger mt-3"></span>
									<button type="submit" class="btn-login">Iniciar Sesión</button>
								</form>
							</div>
							<div class="modal-footer">

								Si no tienes cuenta <a class="link-login" data-bs-toggle="modal" href="#registrate" data-bs-dismiss="modal" aria-label="Close">Registrate aquí</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<!-- Button trigger modal -->
				<button type="button" class="header-menu-button" data-bs-toggle="modal" data-bs-target="#registrate">
					Regístrate
				</button>

				<!-- Modal -->
				<div class="modal fade" id="registrate" tabindex="-1" aria-labelledby="registrate" aria-hidden="true" data-backdrop="static">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<p class="modal-title text-center" id="registrate">Regístrate</p>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="<?php echo base_url() . '/signUp' ?>" method="POST" class="form registro" onsubmit="return validationSignUp(event)">
									<input type="text" name="name" id="name" class="name" placeholder="Nombre Completo" required>
									<input type="text" name="country" id="country" class="country" placeholder="País" required>
									<input type="text" name="city" id="city" class="city" placeholder="Ciudad" required>
									<input type="email" name="email" id="emailSignUp" class="mail" placeholder="Correo" required>
									<input type="password" name="password" id="passwordSignUp" class="pass" placeholder="Contraseña" required>
									<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="rol" name="rol" required>
										<option selected>Rol</option>
										<option value="1">anfitrión</option>
										<option value="2">Invitado</option>
									</select>
									<span id="warningSignUp" class="text-danger mt-3"></span>
									<button type="submit" class="btn-login">Regístrate</button>
								</form>
							</div>
							<div class="modal-footer">

								Si ya tienes cuenta <a class="link-login" data-bs-toggle="modal" href="#iniciarSesion" data-bs-dismiss="modal" aria-label="Close"> Inicia Sesión aquí</a>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</header>

	<main>
		<section class="main">
			<div class="main-title">
				<p>Dejanos encontrar el apartamento de tus sueños </p>
				<h3>O convierte en el mejor anfitrión</h3>
			</div>
			<div class="main-grid">
				<img class="imagen-a" src="https://image.freepik.com/foto-gratis/hermosa-pareja-relajante-casa_23-2148813846.jpg" alt="">
				<img class="imagen-b" src="https://image.freepik.com/foto-gratis/mujer-artista-pinta-cuadro-sobre-lienzo-hace-bocetos-lapiz-sentada-casa-encierro_165285-2397.jpg" alt="">
				<img class="imagen-c" src="https://image.freepik.com/foto-gratis/pareja-romantica-sofa-casa-jugo_23-2148813910.jpg" alt="">
				<img class="imagen-d" src="https://image.freepik.com/foto-gratis/mujer-afroamericana-agotada-durmiendo-sofa-casa-dejando-caer-telefono-celular-suelo-fatiga_165285-2410.jpg" alt="">
				<img class="imagen-e" src="https://image.freepik.com/foto-gratis/pareja-joven-sonriente-cocinar-juntos-casa_23-2148813877.jpg" alt="">
				<img class="imagen-f" src="https://image.freepik.com/foto-gratis/disparo-vertical-empresario-que-trabaja-casa_273609-20504.jpg" alt="">
				<img class="imagen-g" src="https://image.freepik.com/foto-gratis/foto-vertical-sentada-piso-feliz-madre-cabello-rubio-sosteniendo-su-hija-sonriente-pijama-pie-sobre-alfombra-cerca-cama-gris-jugando-perro-shiba-inu-frente-grandes-ventanas-noche_354437-34.jpg" alt="">
				<img class="imagen-h" src="https://image.freepik.com/foto-gratis/mujer-sonriente-tarjeta-credito-smartphone-casa_23-2148793435.jpg" alt="">
				<!-- <img class="imagen-i" src="https://image.freepik.com/foto-gratis/primer-disparo-vertical-perro-salchicha-orejas-largas-aislado-sofa-blanco_181624-29094.jpg" alt="">
		 -->
				<img class="imagen-i" src="https://image.freepik.com/foto-gratis/padre-e-hijo-tiro-completo-piso_23-2148884741.jpg" alt="">
			</div>
		</section>
		<hr class="hr_index" />
		<div class="main-cards m-5">
			<p class="p-5 m-0 index_aptos">Descubre los Alojamientos</p>
		<div class="container">
        
        <?php if ($aparments === array()) {
            echo "<h5>No tienes apartamentos registrados</h5>";
        } ?> <?php if ($aparments !== array()) {
                    echo " <div class='row row-cols-1 row-cols-md-3 g-4'>";
                }
                ?>
        <?php
        foreach ($aparments as $aparment) : ?>

            <?php $updateRoute = base_url() . "/update-apto?id={$aparment['id_apartamentos']}"; ?>

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
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>/assets/js/validation.js"></script>
</body>

</html>
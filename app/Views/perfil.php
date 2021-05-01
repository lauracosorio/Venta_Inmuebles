<div class="container">
    <div class="card text-center mt-5 m-auto" style="width: 28rem;">
        <div class="card-header">
            <h4 class="m-0"><?php echo $user[0]['nombre_completo'] ?></h4>
        </div>
        <div class="card-body">
            <div>
                <img class="mb-4" src="<?php echo $user[0]['foto_perfil'] ?>" alt="">
            </div>
            <h5 class="card-title"><strong> <?php echo $user[0]['email'] ?></strong></h5>
            <p class="card-text"><strong>Biografía: </strong><?php echo $user[0]['biografia'] ?></p>
            <p class="card-text"><strong>País: </strong><?php echo $user[0]['pais'] ?></p>
            <p class="card-text"><strong>Ciudad: </strong><?php echo $user[0]['ciudad'] ?></p>

            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarPerfil">
					Editar Información
				</button>

				<!-- Modal -->
				<div class="modal fade" id="editarPerfil" tabindex="-1" aria-labelledby="editarPerfil" aria-hidden="true" data-backdrop="static">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<p class="modal-title text-center" id="editarPerfil">Editar Información</p>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="<?php echo base_url() . '/updateProfile' ?>" method="POST" class="form registro" onsubmit="return validationSignUp(event)">
									<input type="text" name="name" id="nombre" class="name" placeholder="Nombre Completo" value="<?php echo $user[0]['nombre_completo'] ?>" required>
									<input type="text" name="country" id="country" class="country" placeholder="País" value="<?php echo $user[0]['pais'] ?>" required>
									<input type="text" name="city" id="city" class="city" placeholder="Ciudad" value="<?php echo $user[0]['ciudad'] ?>" required>
									<input type="email" name="email" id="email" class="mail" placeholder="Correo" value="<?php echo $user[0]['email'] ?>" required readonly="readonly">
									<input type="password" name="password" id="password" class="pass" placeholder="Contraseña" value="<?php echo $user[0]['contrasena'] ?>" required>
									<input type="text" name="imagen" id="imagen" class="imagenPerfil" placeholder="URL Imagen Perfil" value="<?php echo $user[0]['foto_perfil'] ?>" required>
                                    <input type="text" name="biografia" id="biografia" class="biografia" placeholder="Biografía" value="<?php echo $user[0]['biografia'] ?>" required>
									<span id="warningSignUp" class="text-danger mt-3"></span>
									<button type="submit" class="btn-login">Editar Información</button>
								</form>
							</div>
						</div>
					</div>
				</div>

        </div>
        <div class="card-footer text-muted">
            <?php $hoy = getdate(); ?>
            <p class="m-0"><?php echo $hoy['mday'] . ' / ' . $hoy['month'] . ' / ' . $hoy['year'] ?></p>
        </div>
    </div>
</div>
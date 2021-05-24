<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title><?php print_r($user[0]['nombre_completo']); ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">


                <h1 class="alquila ms-5 ps-5">
                    <?php
                    if ($user[0] === "" || $user[0] === NULL) {
                        echo " <a href=" . base_url() . "/>Alquila</a></h1>";
                    } else {
                        if($user[0]['rol'] === '1'){
                            echo "<a href=" . base_url() . "/host_view>Alquila</a></h1>";
                        }else {
                            echo "<a href=" . base_url() . "/guest_view>Alquila</a></h1>";
                        }
                    }
                    ?>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex formulario me-auto my-2 my-lg-0 m-auto justify-content-between">
                            <input class=" me-2 search-input" type="search" placeholder="Busca tu apartamento" aria-label="Search">
                            <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>

                        <?php
                        if ($user[0] === "" || $user[0] === NULL) {
                        } else {
                            $urlImg = $user[0]['foto_perfil'];
                            echo "<ul class='nav-list navbar-nav d-flex align-bottom navbar-nav-scroll' style='--bs-scroll-height: 100px;'>
                        <li class='nav-item'>
                            <img class='img_perfil' src='$urlImg' alt='foto_perfil'>
                            <a class='nav-link active mr-5' aria-current='page' href='#'>" . $user[0]['nombre_completo'] . "</a>
                        </li>
                        <ul>
                             <li><a href=" . base_url() . "/profile>Cuenta</a></li>
                             <li><a href=" . base_url() . "/signOut>Cerrar Sesión</a></li>
                        </ul>
                    </ul> ";
                        }
                        ?>
                    </div>
            </div>
        </nav>
    </header>
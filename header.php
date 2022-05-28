<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="<?php echo get_template_directory_uri() . "/style.css";?>"  rel="stylesheet">
  </head>
  <body class="body">

    <nav class="navbar pe-none" data-bs-toggle="collapse" data-bs-target="#navbar-expanded" aria-controls="navbar-expanded">
      <div class="container-fluid mx-3">
        <p class="fw-bold pe-auto mb-0" role="button">
          <i class="bi-chevron-right"></i> Menu
        </p>
        <h1 class= "text-center mb-0"> Autosave </h1>
        <i class="bi-search" style="margin-left: 40px;"></i>
      </div>
    </nav>
    <div class="collapse w-100" id="navbar-expanded">
      <div class="p-4">
        <div class="row">
            <div class="col-2 fs-1">
                <p class="fw-bold hover-underline-animation"><a class="link-container .fs-1text" href="<?php get_home_url() ?>">Anime</a></p><br>
                <p class="fw-bold hover-underline-animation"><a class="link-container .fs-1text" href="<?php get_home_url() ?>">Tech</a></p><br>
                <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Games</a></p><br>
                <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Zine</a></p><br>
            </div>
            <div class="col-2 fs-1">
                <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Podcast</a></p><br>
                <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Shop</a></p><br>
                <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Instagram</a></p><br>
                <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">About Us</a></p><br>
            </div>
            <div class="col-8 position-relative ">
              <p class="fs-6 fw-bold position-absolute bottom-0 right-0" style="right: 0"> For all things anime, tech and games </p>
            </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>
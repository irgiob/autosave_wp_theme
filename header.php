<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="<?php echo get_template_directory_uri() . "/style.css";?>"  rel="stylesheet">
  </head>
  <body class="body">

    <h1 class= "text-center"> Autosave </h1>
      
  <!-- top offcanvas header -->
    <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Menu</button>

<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">

  <div class="offcanvas-header">
    <h5 class="offcanvas-title  text-center w-100" id="offcanvasTopLabel" ><a class="link-container" href="<?php get_home_url() ?>">Autosave</a></h5>
  </div>
  <div class="offcanvas-body">

    <div class="row">
        <div class="col-2 fs-1">
            <p class="fw-bold hover-underline-animation"><a class="link-container .fs-1text" href="<?php get_home_url() ?>">Anime</a></p>
            <p class="fw-bold hover-underline-animation"><a class="link-container .fs-1text" href="<?php get_home_url() ?>">Tech</a></p>
            <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Games</a></p>
            <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Zine</a></p>
        </div>
        <div class="col-2 fs-1">
            <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Podcast</a></p>
            <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Shop</a></p>
            <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Instagram</a></p>
            <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">About Us</a></p>
        </div>
    </div>
    
    <p class="fs-6 text-end fw-bold"> For all things anime, tech and games </p>
  </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>
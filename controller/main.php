<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Decidijc</title>
  <script src="https://kit.fontawesome.com/3290eb4887.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!--<link rel="stylesheet" href="css/style.css">-->
  <link rel="stylesheet" href="http://localhost/JsonDecidijc/css/style.css">
  <script src="
https://cdn.jsdelivr.net/npm/ace-builds@1.35.4/src-min-noconflict/theme-chrome.min.js
"></script>
  <link href="
https://cdn.jsdelivr.net/npm/ace-builds@1.35.4/css/ace.min.css
" rel="stylesheet">
</head>

<body>

  <div class="text-bg-dark screen">
    <header class="container d-flex justify-content-between">
      <div class="logo d-flex align-items-center gap-2 mt-2">
        <i class="fa-solid fa-face-smile-beam fs-2"></i>
        <span class="fs-2 fw-medium">DecidiJC</span>
      </div>
      <nav class="redes mt-2 d-flex align-items-center">
        <a href="https://github.com/JuanCarlosCajas/decidijc" class="nav-link" target="_blank">
          <i class="fa-brands fa-square-github fs-1"></i>
        </a>
      </nav>

    </header>
    <section class="container d-flex flex-wrap justify-content-evenly gap-5 align-items-center title-container mt-5">
      <section class="font-k2d info-container">
        <h1 class="mb-4">Api Store Fake</h1>
        <p class="fs-6">I hope my project helps you in your career as a programmer, both as a frontend and backend (I know that the name of the page has nothing to do with the idea of an api :P).</p>
        <p>
          Would you give me a star in my repository? <span><a href="https://github.com/JuanCarlosCajas/decidijc" target="_blank"><img src="assets/star.svg" alt="" class="star-item"></a></span>
        </p>
      </section>
      <aside>
        <img src="assets/user-shop2.svg" alt="wq" class="programmer">
      </aside>
    </section>
  </div>
  <div class="font-k2d">
    <div class="container mt-5">
      <p class="fs-1 fw-bold">How to use: </p>
      <main class="mt-5">
        <div class="">
          <div class="language-container d-flex justify-content-evenly align-items-center">
            <i class="fa-brands fa-js icon-language"></i>
          </div>
          <pre class="mt-3"><code class="code-js ps-2 rounded-3">
<span class="method">fetch</span><span class="especial">(</span><span class="argument">"http://localhost/JsonDecidijc/productos"</span><span class="especial">)</span>
  <span class="especial">.</span><span class="method-common">then</span><span class="especial">(</span><span class="parameter">response </span><span>=</span><span>> </span><span class="parameter">response</span><span>.</span><span class="method-common">json</span><span class="especial">(</span><span class="especial">)</span><span class="especial">)</span>
  <span class="especial">.</span><span class="method-common">then</span><span class="especial">(</span><span class="parameter">data </span><span>=</span><span>> </span><span class="class">console</span><span>.</span><span class="method-common">log</span><span class="especial">(</span><span class="parameter">data</span><span class="especial">)</span><span class="especial">)</span>
          </code></pre>
        </div>
      </main>
      <p class="fs-1 fw-bold mt-5">Resources: </p>
      <div class="accordion mt-5" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button fw-bold fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Get all the products
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="get-item d-flex flex-wrap">
                <a href="http://localhost/JsonDecidijc/productos" target="_blank" rel="noopener noreferrer" class="link-get">/productos</a>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Get the product by ID
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="get-item d-flex flex-wrap mt-3">
                <a href="http://localhost/JsonDecidijc/productos/1" target="_blank" rel="noopener noreferrer" class="link-get"><?= "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "products/1" ?></a>
                <span>Gets a product with URL</span>
              </div>
              <div class="get-item d-flex flex-wrap mt-3">
                <a href="http://localhost/JsonDecidijc/productos?id=1" target="_blank" rel="noopener noreferrer" class="link-get">/productos?id=1</a>
                <span>Gets a product with query</span>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Get the products by Category
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="get-item d-flex flex-wrap">
                <a href="http://localhost/JsonDecidijc/productos?category=electronica" target="_blank" class="link-get"><?= "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "products?category=electronica" ?></a>
                <span>Delete a product by ID</span>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Get the products by Pagination
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="get-item d-flex flex-wrap">
                <a href="http://localhost/JsonDecidijc/productos?page=1&limit=10" target="_blank" class="link-get"><?= "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "products?page=1&limit=10" ?></a>
                <span>Get 10 the products with query</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="text-bg-dark font-k2d mt-5 pt-2 pb-2 d-flex justify-content-between">
    <!--<p>33, 37, 41 tema para dark</p>-->
    <div class="container d-flex justify-content-between">
      <p class="mt-3">
        Made by Juan Carlos ❤️
      </p>
      <p class="mt-3">
        © Copyright 2024 Decidijc. All rights reserved.
      </p>
    </div>
  </footer>

  <script src="js/main.js"></script>
</body>

</html>
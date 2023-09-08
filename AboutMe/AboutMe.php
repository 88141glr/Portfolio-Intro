<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>About Me</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    
  </head>
  <body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-secondary">Over Mij</a></li>
          <li><a href="../Projects/projects.php" class="nav-link px-2 text-white">Projecten</a></li>
          <li><a href="../Contact/Contact.php" class="nav-link px-2 text-white">Contact</a></li>
        </ul>


        <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                // Show the "Logout" link when logged in
                echo '<div class="dropdown text-end">';
                echo '<a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                echo '<img src="../Media/kirbe.png" alt="mdo" width="32" height="32" class="rounded-circle">';
                echo '</a>';
                echo '<ul class="dropdown-menu text-small">';
                echo '<li><a class="dropdown-item" href="../ADMIN/admincomments.php">Remove Comments</a></li>';
                echo '<li><a class="dropdown-item" href="../ADMIN/adminprojects.php">Remove Projects</a></li>';
                echo '<li><a class="dropdown-item" href="../ADMIN/adminupload.php">Upload Projects</a></li>';
                echo '<li><hr class="dropdown-divider"></li>';
                echo ' <li><a class="dropdown-item" href="../ADMIN/Login/logout.php">Sign out</a></li>';
                echo '</ul>';
            } else {
                // Show the "Login" link when not logged in
                echo '   <div class="text-end">';
                echo '   <a href="../ADMIN/Login/login.php"><button type="button" class="btn btn-outline-light me-2" >Login</button></a>';
                echo '  </div>';
            }
            ?>

        </header>

<div class="col-lg-8 mx-auto p-4 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Over Mij</span>
    </a>
  </header>

  <main>  
    <h1 class="text-body-emphasis">CV</h1>
    <p class="fs-5 col-md-8">Hier is mijn CV te vinden.</p>

    <div class="mb-5">
      <a href="#" class="btn btn-primary btn-lg px-4 disabled" aria-disabled="true">Bekijk mijn CV</a>
    </div>
    <p class="fw-lighter fst-italic">CV is (huidig) niet beschikbaar</p>

    <hr class="col-3 col-md-2 mb-5">

    <div class="row g-5">
      <div class="col-md-6">
        <h2 class="text-body-emphasis">Over Mij</h2>
        <p>Ik ben Dennis Janssen, student software developer op het Grafisch Lyceum Rotterdam. Ik ben geboren op 14 februari 2005. Mijn hobbie is voornamelijk gamen, alhoewel dit tegenwoordig wat minder is.</p>
      </div>

      <!-- <div class="col-md-6">
        <h2 class="text-body-emphasis">Guides</h2>
        <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
      </div> -->
    </div>
  </main>
  <footer class="pt-5 my-5 text-body-secondary border-top">
    Dennis Janssen &middot; Software Developer
  </footer>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

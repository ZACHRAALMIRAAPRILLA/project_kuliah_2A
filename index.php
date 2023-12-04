<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedikaApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <!--header-->
    <nav class="navbar navbar-expand navbar-dark bg-success"> <!-- Change bg-dark to bg-success -->
      <div class="container-lg"> 
        <a class="navbar-brand" href="#"><i  class="bi bi-hospital"> </i>MedikaApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Username
              </a>
              <ul class="dropdown-menu dropdown-menu-end mt-2">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Setting</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--endheader-->
    <div class="container-lg">
      <div class="row">
        <!--sidebar --->
        <div class="col-lg-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-2">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 ">
          <li class="nav-item">
            <a class="nav-link active link-light" aria-current="page" href="#"><i class="bi bi-house-door"></i> Home</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-person-square"></i> User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-person-arms-up"></i>Pasien</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-person"></i>Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-clipboard-plus"></i> Operator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-flag-fill"></i> Report</a>
          </li>
          
        </ul>
       
      </div>
    </div>
  </div>
</nav>
</nav>

          <!-- Sidebar content here -->
        </div>
        <!--end sidebar --->

        <!--content --->
        <div class="col-lg-9 bg-dark mt-2">
            
          <!-- Content goes here -->
        </div>
        <!--end content --->
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
class layouts {
    public function header($conf) {
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Astro v5.13.2">
      <title>Jumbotron example · Bootstrap v5.3</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
                <?php
    }

   public function navbar($conf) {
    ?>
    <main>
       <div class="container py-4">
          <header class="pb-3 mb-4 border-bottom">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                   <a class="navbar-brand" href="#">Welcome to Strathmore BBIT</a>
                   <div class="d-flex w-100">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item"><a class="nav-link active" aria-current="page" href="./">Home</a></li>
                         <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                         <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                         <li class="nav-item"><a class="nav-link" href="admin.php">Admin Log in</a></li>
                      </ul>
                      <form class="d-flex" role="search">
                         <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                      </form>
                   </div>
                </div>
             </nav>
          </header>
    <?php
}
    public function banner($conf) {
               ?>
            
               <?php
    }
    public function content($conf) {
?>

            <div class="row align-items-md-stretch">
               <div class="col-md-6">
                  <div class="h-100 p-5 text-bg-dark rounded-3">
                     <h2>Change the background</h2>
                     <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                     <button class="btn btn-outline-light" type="button">Example button</button> 
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                     <h2>Add borders</h2>
                     <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                     <button class="btn btn-outline-secondary" type="button">Example button</button> 
                  </div>
               </div>
            </div>
            <?php
    }
    public function form_content($conf, $ObjForms = null) {
?>

 
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <?php if (basename($_SERVER['PHP_SELF']) == 'signup.php') { ?>
               
                    <h2 class="mb-3">Sign Up</h2>
                    <form action="signup.php" method="post"  >
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
               
                <?php } elseif (basename($_SERVER['PHP_SELF']) == 'signin.php') { ?>
                    <h2 class="mb-3">Sign In</h2>
                    <form action="signin.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

<?php
}

    public function footer($conf) {
?>
            <footer class="pt-3 mt-4 text-body-secondary border-top">
              Copyrights &copy; <?php echo date("Y") . " " . $conf['site_name']; ?>. All rights reserved.
            </footer>
         </div>
      </main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
   </body>
</html>
<?php
    }
}
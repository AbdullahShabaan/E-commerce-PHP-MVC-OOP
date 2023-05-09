
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <!-- Your HTML code here -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<section class="vh-100" style="background-color: #342c2d;">
<!--<h3 class="text-center">Admin Login</h3>-->
  <div class="container py-5 h-100 text-center">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-6">
        <div class="card" style="border-radius: 4rem;">

<!--            <div class="col-md-6 col-lg-7 d-flex align-items-center">-->
              <div class="card-body p-4 p-lg-4 text-black">

                <form action = "postlogin" method = "POST" >

                  <div class=" text-center mb-3 ">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>

                      
                      <h2 >Admin Login</h2>
                      
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" name="name" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="pass" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

<!--                  <div class="pt-1 mb-4">-->
                   <button type="submit" class="btn btn-primary w-100 btn btn-dark btn-lg m-1">Log in</button>
<!--                  </div>-->

<!--                  <a class="small text-muted" href="#!">Forgot password?</a>-->
<!--
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                      style="color: #393f81;">Register here</a></p>
-->
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                    
                                          <img class= " m-2" src="<?= CSS_PATH ; ?>/back/plugins/images/logo-text.png" alt="homepage" />
                </form>

              </div>
        </div>
      </div>
    </div>
  </div>
</section>


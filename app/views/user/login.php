<?php 
  if (!empty($_SESSION)) {
    echo "<script>window.location.href = '".BASEURL."/Books';</script>";
  }
 ?>
<section class="vh-100" style="background-color: #0D6EFD;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block" style="background-image: url(https://static01.nyt.com/images/2019/12/17/books/review/17fatbooks/17fatbooks-superJumbo.jpg); background-size: cover;"></div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account </h5>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                    <input type="username" id="username" name="username" class="form-control form-control-lg" required/>
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-primary btn-lg rounded-pill"  type="submit" name="login">Sign In</button>
                  </div>

             <!--      <a class="small text-muted" href="#!">Forgot password?</a> -->
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="<?= BASEURL; ?>/user/register"
                      style="color: #393f81;">Register here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!doctype html>
<html lang="en">
  <head>
    <title>Registration Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <section class="vh-100" style="background-color:#d3d3d3;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5" style="border:3px solid gray; border-radius:1.5rem;">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-4" style="font-family:'Times New Roman', Times, serif; font-weight: bold;">Register</p>
                <hr style="width:110px; border: 1px solid gray;"><br>
                <form action="{{URL:: to ('/regpost_')}}" method="POST" id="form" class="mx-1 mx-md-4">
                  @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example3c" class="form-control" name="nameinput" style="border: 1px solid gray;" />
                      <label class="form-label" for="form3Example3c" style="font-weight:bold;">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="emailinput" style="border: 1px solid gray;" />
                      <label class="form-label" for="form3Example3c" style="font-weight:bold;">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="passwordinput" style="border: 1px solid gray;" required/>
                      <label class="form-label" for="form3Example4c" style="font-weight:bold;">Password</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="coninput" style="border: 1px solid gray;" required/>
                      <label class="form-label" for="form3Example4c" style="font-weight:bold;">Confirm Password</label>
                    </div>
                  </div>
                  <!-- @if(session('errormessage'))
                    <div class="alert alert-info" role="alert">
                    <strong>{{(session('errormessage'))}}</strong>
                    </div>
                  @endif -->
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" style="font-weight:bold;">Register</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://www.mendix.com/wp-content/uploads/low-code-guide-pro-dev.png" class="img-fluid ml-5" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet') }}">
    <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css" rel="stylesheet') }}">
    <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet') }}">
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet') }}">
    <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css" rel="stylesheet') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
              <div class="d-flex justify-content-center py-4">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center w-auto">
                  <img src="admin/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Para</span>
                </a>
              </div><!-- End Logo -->
    
              <div class="card mb-3">
    
                <div class="card-body">
    
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                        <p class="text-center small">Enter your personal details to create account</p>

                        @include('flash-message')
                    </div>
    
                    <form action="{{ route('signup') }}" method="POST" class="row g-3 needs-validation">
                        @csrf
                        <div class="col-12">
                        <label for="yourName" class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" id="yourName" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                        </div>
    
                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div>
    
    
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                        <div class="col-12">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                            <div class="invalid-feedback">Please confirm your password!</div>
                        </div>
    
                        <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                        </div>
                        <div class="col-12">
                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>
</body>
</html>
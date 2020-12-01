<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Codeigniter</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/build/css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		.form-control-user {
		  font-size: .8rem;
			border-radius: 10rem;
			padding: 1.5rem 1rem;
		}
		.btn-user {
			font-size: .8rem;
			border-radius: 10rem;
			padding: .75rem 1rem;
		}
		/* .bg-gradient-primary {
			background-image: url(../assets/images/municipal.jpg);
		} */
		.body {
				position: absolute;
				top: 0px;
				left: -5px;
				right: 0px;
				bottom: 0px;
				width: auto;
				height: auto;
				/* background-image: url(../assets/images/municipal.jpg); */
				background-size: cover;
				background-repeat: no-repeat;
				-webkit-filter: blur(8px);
				z-index: 0;
				background-size: 100% 120%;
				background-color: #2A3F54;
		}
		.my-5 {
			margin-top: 10rem!important;
		}
	</style>
</head>

<body class="bg-gradient-primary">
	<div class="body"></div>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">My Codeigniter</h1>
									</div>
									<?php if($this->session->flashdata('invalid_msg')): ?>
									<div class="alert alert-danger">
										<?php echo $this->session->flashdata('invalid_msg'); ?>
									</div>
									<?php endif; ?>
                  <form method="post" action="<?=base_url()?>secure/signin">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="LOGIN">
                  </form>  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/vendors/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/vendors/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

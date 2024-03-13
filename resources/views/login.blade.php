<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#1c1c1c" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Last Mile Audit : Login</title>
		<meta name="author" content="" />
		<meta name="generator" content="" />
		<link rel="canonical" href="" />
		<!-- GOOGLE FONTS FOR SITE TEXT -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
		<!-- FONTAWESOME v6.2.1 -->
		<link rel="stylesheet" href="css/all.min.css" />
		<!-- BOOTSTRAP v5.3.0 -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- MAIN STYLES -->
		<link rel="stylesheet" href="css/main.css" />
		<!-- FAVICON -->
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="icon" href="images/favicon.png" type="image/x-icon" />
	</head>
	<style>
		.form-signin {
			max-width: 400px;
			padding: 2rem;
		}

		.form-logo img {
			max-width: 120px;
			height: auto;
		}
	</style>

	<body class="bg-light-1 p-4 mh-100vh d-flex align-items-center">
		<main class="form-signin w-100 m-auto bg-white shadow-sm">
			@if (session('message'))
				<div class="alert alert-success alert-dismissible fade show mx-4 mb-0 mt-3" role="alert">
					{{ session('message') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			<form method="POST" action="{{ route('login') }}" id="login-form" name="login-form">
				@csrf
				<div class="form-logo mb-4"><img class="img-fluid mx-auto d-block" src="images/logo.png" alt=""></div>
				<h1 class="h5 mb-3 fw600 text-center mb-3 text-dark">Login here</h1>
				<div class="form-floating mb-2">
					<input type="text" class="form-control" name="name" id="username" placeholder="Username*" />
					<label for="username">Username*</label>
					@error('name')
                    <span class="invalid-feedback mt-n3 mb-3" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
				</div>
				<div class="form-floating mb-2">
					<input type="email" name="company_name" class="form-control" id="companyname" placeholder="Company Name*" />
					<label for="companyname">Company Name*</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password*" />
					<label for="floatingPassword">Password*</label>
					@error('password')
                    <span class="invalid-feedback mt-n3 mb-3" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
				</div>
				<!-- <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault"> Remember me </label>
        </div> -->
				<button type="submit" class="btn btn-prime w-100 py-3">LOGIN</button>
					</form>
		</main>
		<!-- JAVASCRIPT FILES -->
		<script src="js/jquery-3.6.0.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/index.global.min.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
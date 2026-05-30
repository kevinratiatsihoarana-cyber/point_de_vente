<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Login</title>
    <style type='text/css'>
        .authlogin-side-wrapper{
            width:100%;
            height:100%;
            background-image:url({{asset('upload/login.png')}});
        }
    </style>

 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  


	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/styles.css')}}">
	

	

	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">



	<link rel="stylesheet" href="{{asset('backend/assets/css/demo2/style.css')}}">


  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                              <div class="col-md-4 pe-md-0">
                                 <div class="authlogin-side-wrapper">

                                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <h2 class="text-muted fw-normal mb-4">S'inscrire</h2>
                    @if(session()->has('error'))
                    <div class="alert alert-danger" >{{session()->get('error')}}</div>
                    @endif
                    <form class="forms-sample" action="" method='POST'>
                    @csrf
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="userEmail" placeholder="Nom" name='name'>
                        @error('name')
                        <small class='text-danger'>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name='email'>
                        @error('email')
                        <small class='text-danger'>{{$message}}</small>
                        @enderror
                        <span id="emailMessage" class="message"></span>
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="mot de passe" name='password'>
                        @error('password')
                        <small class='text-danger'>{{$message}}</small>
                        @enderror
                        <span id="passwordMessage" class="message"></span>
                      </div>
                      <div>
                        <button type="submit" name="submit" value="submit"class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                            Se connecter
                        </button>
                       
                      </div>
                      <a href="{{url('/login')}}" class="d-block mt-3 text-muted">Se connecter</a>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	
	<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
	



	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>
  <script src="{{asset('backend/assets/js/scripts.js')}}"></script>
	<!-- endinject -->


</body>
</html>
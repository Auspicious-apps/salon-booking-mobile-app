<! DOCTYPE html>
<html lng="en">
<head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <title>Mi-Salon - Take your salon to the next level!</title>
	  <link rel="icon" type="image/x-icon" href="{{ asset('our_app/Mi-Favicon.png') }}">
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/style-testimonials.css') }}">
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>	
<body class="home">
			
			<!-- include header-->
				@include('layout-dashboard.header')
			<!-- end header -->

			<main class="main-section">
			
				@yield('content')

			</main>

			<!-- include header-->
				@include('layout-dashboard.footer')
			<!-- end header -->

	

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'>
	</script><script  src="{{ asset('js/script.js') }}"></script>



<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
<?php 
	Route::set('home', function() {
		App::CreateView('home');
	});

	Route::set('privacy-policy', function() {
		App::CreateView('privacy-policy');
	});
?>
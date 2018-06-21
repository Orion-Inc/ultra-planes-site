<?php 
	Route::set('home', function() {
		App::CreateView('home');
	});

	Route::set('about', function() {
		App::CreateView('about');
	});

	Route::set('privacy-policy', function() {
		App::CreateView('privacy-policy');
	});

	Route::set('contact', function() {
		App::CreateView('contact');
	});
?>
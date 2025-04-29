@extends('layouts.app')
@section('content')
@section('title', 'Home')
@section('description', 'Welcome to The Kwéyòl Hub, your gateway to learning and celebrating the rich culture of St. Lucia through the Kwéyòl language.')
@section('keywords', 'Kwéyòl, St. Lucia, Language Learning, Culture, Heritage, Online Dictionary, Body Parts, Numbers, Time')
<section class="hero">
		<div class="hero-overlay"></div>
		<div class="hero-content">
			<h1 class="display-4 fw-bold">Welcome to St. Lucia's First-Ever Kwéyòl Hub</h1>
			<p class="lead">Celebrating and preserving Saint Lucia's rich heritage through the Kwéyòl language.</p>
			<!-- <a href="#" class="btn btn-outline-info btn-lg mt-3">Learn More</a> -->
		</div>
</section>
<div class="row learn-more justify-content-center">
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card shadow-md border-0">
					<div class="card-body text-center">
						<h2 class="card-title">🔢 Numbers</h2>
						<p class="card-text">Learn to count in Creole! From 1 to 100,000, get familiar with the numbers
							you need every day. 💯✨</p>
						<a href="{{route('learn.numbers')}}" class="btn btn-outline-warning">Explore</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card shadow-md border-0">
					<div class="card-body text-center">
						<h2 class="card-title">👤 Body Parts</h2>
						<p class="card-text">Explore the Creole names for body parts. From head to toe, know your body
							in our local language! 👣💪</p>
						<a href="{{route('learn.body-parts')}}" class="btn btn-outline-warning">Explore</a>
					</div>
				</div>
			</div>
			<div class="row learn more">
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card shadow-md border-0">
						<div class="card-body text-center">
							<h2 class="card-title">📖 Online Dictionary</h2>
							<p class="card-text">Your go-to Creole dictionary! Quickly find translations and meanings to
								connect deeper with the language. 📚💬</p>
							<a href="{{route('learn.online-dictionary')}}" class="btn btn-outline-warning">Explore</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card shadow-md border-0">
						<div class="card-body text-center">
							<h2 class="card-title">🏞️ St. Lucia Parish</h2>
							<p class="card-text">Discover the beauty of St. Lucia! Learn the names of iconic landmarks
								in Creole and explore our island’s heritage. 🏝️🌋.</p>
							<a href="{{route('learn.saint-lucia')}}" class="btn btn-outline-warning">Explore</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card shadow-md border-0">
						<div class="card-body text-center">
							<h2 class="card-title">⏰ Time</h2>
							<p class="card-text">Discover the Creole names for hours, days, and seasons. Never miss a
								moment in our rich St. Lucian culture! 🌞🌴</p>
							<a href="{{route('learn.time')}}" class="btn btn-outline-warning">Explore</a>
						</div>
					</div>
				</div>
</div>
@endsection

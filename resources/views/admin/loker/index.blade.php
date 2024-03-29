@extends('layouts.master')
@section('title', 'Category')
@push('page-css')
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
     {{-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> --}}
    <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables.css" rel="stylesheet"> -->
    <link href="assets/css/main.css" rel="stylesheet">
@endpush
@section('content')
<style>
  /* Font */
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

/* Design */
*,
*::before,
*::after {
  box-sizing: border-box;
}


body {
  color: #272727;
  font-family: 'Quicksand', serif;
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
  padding: 1rem;
}

.main{
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
    font-size: 24px;
    font-weight: 400;
    text-align: center;
}

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}

.btn {
  color: #ffffff;
  padding: 0.8rem;
  font-size: 14px;
  text-transform: uppercase;
  border-radius: 4px;
  font-weight: 400;
  display: block;
  width: 100%;
  cursor: pointer;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: transparent;
}

.btn:hover {
  background-color: #407BFF;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards_item {
  display: flex;
  padding: 1rem;
}

@media (min-width: 40rem) {
  .cards_item {
    width: 50%;
  }
}

@media (min-width: 56rem) {
  .cards_item {
    width: 33.3333%;
  }
}

.card {
  background-color: white;
  border-radius: 0.25rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.card_content {
  padding: 1rem;
  background: #001866;
}

.card_title {
  color: #ffffff;
  font-size: 1.1rem;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: capitalize;
  margin: 0px;
}

.card_text {
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;    
  font-weight: 400;
}

  </style>
   <div class="main">
  <h1>Informasi Lowongan Pekerjaan</h1>
  <ul class="cards">
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=10"></div>
        <div class="card_content">
          <h2 class="card_title">Bidang keuangan</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=5"></div>
        <div class="card_content">
          <h2 class="card_title">Akuntansi</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=11"></div>
        <div class="card_content">
          <h2 class="card_title">Bidang Sumberdaya Manusia</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=14"></div>
        <div class="card_content">
          <h2 class="card_title">Staf Pajak/Safety</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=17"></div>
        <div class="card_content">
          <h2 class="card_title">Bidang Borongan Lupsum</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=2"></div>
        <div class="card_content">
          <h2 class="card_title">Staf Jasa Borongan Lupsum</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=17"></div>
        <div class="card_content">
          <h2 class="card_title">Bidang Pemborongan</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div> <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=17"></div>
        <div class="card_content">
          <h2 class="card_title">Staf Jasa Pemborongan</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
      <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://picsum.photos/500/300/?image=17"></div>
        <div class="card_content">
          <h2 class="card_title">Pengawas</h2>
          <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          <button class="btn card_btn">Read More</button>
        </div>
      </div>
  </ul>
  
</div>
@endsection

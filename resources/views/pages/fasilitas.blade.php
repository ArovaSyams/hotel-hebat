@extends('layouts.app')

@section('content')

<main>

<section id="speakers">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Fasilitas Hotel</h2>
        <p>Berbagai Fasilitas Tersedia Untuk Anda</p>
      </div>
  
      <div class="row">
        @foreach ($fasilitasHotel as $fh)
        <div class="col-lg-4 col-md-6">
          <div class="speaker" data-aos="fade-up" data-aos-delay="100">
            <div style="height: 250px">
              <img src="/storage/{{ $fh->image }}" alt="Speaker 1" style="object-fit: cover" width="450px">
            </div>
            <div class="details">
              <h3><a href="speaker-details.html">{{ $fh->nama_fasilitas }}</a></h3>
              <hr>
              <p>{{ $fh->keterangan }}</p>
            </div>
          </div>
        </div>      
        @endforeach
      </div>
    </div>
  
  </section><!-- End Speakers Section -->

</main>
    
@endsection
@extends('layouts.app')

@section('content')

<main>

    <!-- ======= Hotels Section ======= -->
<section id="hotels" class="section-with-bg">

    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Kamar</h2>
        <p>Berbagai Jenis Kamar Berdasarkan Kelas Untuk Kenyamanan Anda</p>
      </div>
  
      <div class="row" data-aos="fade-up" data-aos-delay="100">
  
        @foreach ($kamar as $k)
        <div class="col-lg-4 col-md-6">
          <div class="hotel">
            <div class="hotel-img" style="height: 250px">
              <img src="/storage/{{ $k->image }}" alt="Hotel 1" class="" style="object-fit: cover" width="450px">
            </div>
            <h3><a href="#">{{ $k->tipe_kamar }}</a></h3>
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            @foreach ($fasilitasKamar->where('kamar_id', $k->id) as $fk)
            <ul>
              <li>{{ $fk->nama_fasilitas }}</li>
            </ul>
            @endforeach
          </div>
        </div>
        @endforeach
  
      </div>
    </div>
  
  </section><!-- End Hotels Section -->
  

</main>
    
@endsection
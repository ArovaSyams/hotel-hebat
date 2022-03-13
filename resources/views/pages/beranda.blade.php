@extends('layouts.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
    <h1 class="mb-4 pb-0">The Finest <br><span>Hotel</span> At the best price</h1>

    @if (Auth::check() && Auth::user()->role === 'user')
    <a href="/pemesanan" class="about-btn scrollto">Pesan Sekarang</a>
    @else
    <a href="/login" class="about-btn scrollto">Pesan Sekarang</a>
    @endif
  </div>
</section><!-- End Hero Section -->

<main id="main">

<!-- ======= Speakers Section ======= -->
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


<!-- ======= Subscribe Section ======= -->
<section id="subscribe">
  <div class="container" data-aos="zoom-in">
    <div class="section-header">
      <h2>Newsletter</h2>
      <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
    </div>

    <form method="POST" action="#">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10 d-flex">
          <input type="text" class="form-control" placeholder="Enter your Email">
          <button type="submit" class="ms-2">Subscribe</button>
        </div>
      </div>
    </form>

  </div>
</section><!-- End Subscribe Section -->

<!-- ======= Buy Ticket Section ======= -->
<section id="buy-tickets" class="section-with-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Buy Tickets</h2>
      <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
    </div>

    <div class="row">
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
            <h6 class="card-price text-center">$150</h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Community Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
            </ul>
            <hr>
            <div class="text-center">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
            <h6 class="card-price text-center">$250</h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
            </ul>
            <hr>
            <div class="text-center">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
            <h6 class="card-price text-center">$350</h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
            </ul>
            <hr>
            <div class="text-center">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy Now</button>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Modal Order Form -->
  <div id="buy-ticket-modal" class="modal fade">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Buy Tickets</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="#">
            <div class="form-group">
              <input type="text" class="form-control" name="your-name" placeholder="Your Name">
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="your-email" placeholder="Your Email">
            </div>
            <div class="form-group mt-3">
              <select id="ticket-type" name="ticket-type" class="form-select">
                <option value="">-- Select Your Ticket Type --</option>
                <option value="standard-access">Standard Access</option>
                <option value="pro-access">Pro Access</option>
                <option value="premium-access">Premium Access</option>
              </select>
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn">Buy Now</button>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</section><!-- End Buy Ticket Section -->

<!-- ======= Contact Section ======= -->
{{-- <section id="contact" class="section-bg">

  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Contact Us</h2>
      <p>Nihil officia ut sint molestiae tenetur.</p>
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="bi bi-geo-alt"></i>
          <h3>Address</h3>
          <address>A108 Adam Street, NY 535022, USA</address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="bi bi-phone"></i>
          <h3>Phone Number</h3>
          <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="bi bi-envelope"></i>
          <h3>Email</h3>
          <p><a href="mailto:info@example.com">info@example.com</a></p>
        </div>
      </div>

    </div>

    <div class="form">
      <form action="forms/contact.php" method="post" role="form" class="php-email-form">
        <div class="row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="form-group col-md-6 mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div>

  </div>
</section><!-- End Contact Section --> --}}

@endsection
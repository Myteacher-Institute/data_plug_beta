@extends('layouts.otherpages')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Services</span>
          </h2>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
          </p>
        </div>
        <div class="row">
          <div class="col-md-4 cr ">
            <div class="box ">
              <div class="img-box">
                {{-- <img src="images/s1.png" alt=""> --}}
                <i class="fas fa-wallet fa-4x"></i>
              </div>
              <div class="detail-box">
                <h5>
                  Currency Wallet
                </h5>
                <p>
                  fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  The
                  point of using
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 cr ">
            <div class="box ">
              <div class="img-box">
                {{-- <img src="images/s2.png" alt=""> --}}
                <i class="fas fa-shield-halved fa-4x"></i>
              </div>
              <div class="detail-box">
                <h5>
                  Security Storage
                </h5>
                <p>
                  fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  The
                  point of using
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 cr ">
            <div class="box ">
              <div class="img-box">
                {{-- <img src="images/s3.png" alt=""> --}}
                <i class="fas fa-users-gear fa-4x"></i>
              </div>
              <div class="detail-box">
                <h5>
                  Expert Support
                </h5>
                <p>
                  fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  The
                  point of using
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-box">
          <a href="">
            View All
          </a>
        </div>
      </div>
    </div>
  </section>

  @include('includes.footer')
@endsection

@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

    <section class="bannerSec">
      <img src="{{asset($inner_banner3->image)}}" class="img-responsive" alt="Banner">
      <div class="banner-overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="theme-heading">
                <h2>{{$inner_banner3->title}}</h2>
                <?= html_entity_decode($inner_banner3->description) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div class="section contact-page-sec">
          <div class="contact-sec sec-padding">

            <div class="contact-heading">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2>Get In Touch</h2>
                </div>
              </div>
            </div>
            <div class="contactpagesec">
                    <form method="post" action="{{route('store_review')}}">
                      @csrf
                      <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="name form-group">
                                <input type="text" class="form-control @error('name') is-danger @enderror" name="name" placeholder="Your name*" id="name" required>
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                              </div>
                              @error('name')
                                  <p class="help is-danger">{{ $errors->first('name') }}</p>
                                  @enderror
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="email form-group">
                                <input type="text" name="email" class="form-control @error('email') is-danger @enderror" placeholder="Email*" id="email" required>
                                <span><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                              </div>
                              @error('email')
                                  <p class="help is-danger">{{ $errors->first('email') }}</p>
                                  @enderror
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="details form-group">
                                <textarea name="review" id="review" rows="6" class="form-control @error('review') is-danger @enderror" placeholder="Review..." required></textarea>
                                <span><i class="fa fa-comment" aria-hidden="true"></i></span>
                              </div>
                              @error('review')
                                  <p class="help is-danger">{{ $errors->first('review') }}</p>
                                  @enderror
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                              <div class="form-group">
                                <button type="buton">Submit Now</button>
                              </div>
                          </div>
                      </div>
                    </form>
                </div>

      </div>
      </div>


<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
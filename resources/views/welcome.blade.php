@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

    <div id="fullpage">
        <div class="section active" id="section0" style="
    background: url({{asset($banner->image)}}) no-repeat top center/ cover;">
            <div class="main-sec sec-padding">
              <div class="col-md-5 col-sm-5 col-xs-12">
            <h2>{{$latest_book->name}}</h2>
            <?= html_entity_decode($latest_book->content) ?>
            <a href="#" class="theme-btn">Get your copy now!</a>
          </div>

          <div class="col-md-4 col-sm-4 col-md-offset-1">
            <div class="right-box">
              <div class="book-img">
                <img class="img-responsive" src="{{asset($latest_book->image)}}" alt="image"/>
              </div>
              <a href="#" class="commingsoon">Coming Soon</a>
            </div>
          </div>
          <!-- <div class="main-before-text">
            <h3>A</h3>
          </div> -->
        </div>
        </div>

        <div class="section" id="section1">
            <div class="about-sec sec-padding">
                <div class="about-heading">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h2>About The Book</h2>
                  </div>
                </div>
              </div>


              <div class="about-slider">
                <div class="row">
                  <div class="owl-carousel owl-carousel-box">
                    @foreach ($books as $book)
                    <div class="book-slide-box flexCol">
                      <div class="col-md-5">
                        <h2>{{$book->book_title}} </h2>
                    <?= html_entity_decode($book->description) ?>
                    <a href="#" class="theme-btn">Pre-order now!</a>
                      </div>

                      <div class="col-md-6">
                        <div class="book-img">
                      <img class="img-responsive" src="{{asset($book->cover_image)}}" alt="image"/>
                    </div>
                      </div>
                    </div>
                    @endforeach

                    
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="section video-sec" id="section2">
            <div class="video-sec sec-padding">
              <div class="watch-video-btn text-center">
                <a href="{{asset('video/dummy_vid.mp4')}}" data-fancybox="" ><span><i class="fa fa-play" aria-hidden="true"></i></span></a>
                <h3>Watch Trailer</h3>
              </div>
        </div>
        </div>

        <div class="section contact-page-sec" id="section3">
            <div class="contact-sec sec-padding">

              <div class="contact-heading">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h2>Leave a Message</h2>
                  </div>
                </div>
              </div>
              <div class="contactpagesec">
                      <form method="post" action="{{ route('contactUsSubmit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              @error('name')
                                  <p class="help is-danger">{{ $errors->first('name') }}</p>
                                  @enderror
                                <div class="name form-group">
                                  <input type="text" class="form-control @error('name') is-danger @enderror" placeholder="Your name*" name="name" id="name" required>
                                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              @error('address')
                                  <p class="help is-danger">{{ $errors->first('address') }}</p>
                                  @enderror
                                <div class="name form-group">
                                  <input type="text" class="form-control @error('address') is-danger @enderror" placeholder="Contact Details*" name="address" id="address" required>
                                  <span><i class="fa fa-address-book-o" aria-hidden="true"></i></span>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="details form-group">
                                  <input type="text" class="form-control" placeholder="Phone*" name="phone" id="phone">    
                                  <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              @error('email')
                                  <p class="help is-danger">{{ $errors->first('email') }}</p>
                                  @enderror
                                <div class="email form-group">
                                  <input type="text" class="form-control @error('email') is-danger @enderror" placeholder="Email*" name="email" id="email" required>
                                  <span><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              @error('message')
                                  <p class="help is-danger">{{ $errors->first('message') }}</p>
                                  @enderror
                                <div class="details form-group">
                                  <textarea name="message" id="message" rows="6" class="form-control @error('message') is-danger @enderror" placeholder="Message..." required></textarea>
                                  <span><i class="fa fa-comment" aria-hidden="true"></i></span>
                                </div>
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
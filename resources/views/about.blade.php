@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

    <section class="bannerSec">
      <img src="{{asset($inner_banner1->image)}}" class="img-responsive" alt="Banner">
      <div class="banner-overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="theme-heading">
                <h2>{{$inner_banner1->title}}</h2>
                <?= html_entity_decode($inner_banner1->description) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <section class="about-author green-bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
              <h2>{{$author_name1->name}}</h2>
            <?= html_entity_decode($author_name1->content) ?>
            </div>

            <div class="col-md-4">
              <!-- <div class="book-img">
              <img class="img-responsive" src="images/author-img.jpg" alt="image"/>
            </div> -->
            </div>

            <div class="col-md-6">
              <?= html_entity_decode($author_name2->content) ?>
            </div>
        </div>
      </div>
    </section>


    <div class="section video-sec">
          <div class="video-sec sec-padding">
            <div class="watch-video-btn text-center">
              <a href="{{asset('video/dummy_vid.mp4')}}" data-fancybox="" ><span><i class="fa fa-play" aria-hidden="true"></i></span></a>
              <h3>Watch Trailer</h3>
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
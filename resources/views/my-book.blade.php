@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

    <section class="bannerSec">
      <img src="{{asset($inner_banner2->image)}}" class="img-responsive" alt="Banner">
      <div class="banner-overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="theme-heading">
                <h2>{{$inner_banner2->title}}</h2>
                <?= html_entity_decode($inner_banner2->description) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <section class="book-sec green-bg">
      <div class="container">
        <div class="row">
          <div class="book-slide-box flexCol">
                <div class="col-md-4">
                  <h2>{{$book->name}}</h2>
              <?= html_entity_decode($book->content) ?>
              <a href="#" class="theme-btn">Pre Order Now</a>
                </div>

                <div class="col-md-7 col-md-offset-1">
                  <div class="book-img book-before">
                <img class="img-responsive" src="{{asset($book->image)}}" alt="image"/>
              </div>
                </div>
              </div>
        </div>
      </div>
    </section>




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
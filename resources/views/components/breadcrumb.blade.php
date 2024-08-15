@props(['title','images'])
<section class="inner-banner-wrap">
  <div class="inner-baner-container" style="background-image: url({{ $images ?? asset('user_ui/assets/img/eventum-img1.jpg')}});">
    <div class="container">
      <div class="inner-banner-content">
        <h1 class="inner-title">{!! $title !!}</h1>
      </div>
    </div>
  </div>
</section>

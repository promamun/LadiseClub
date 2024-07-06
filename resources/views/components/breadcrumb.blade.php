@props(['title','images'])
<section class="inner-banner-wrap">
  <div class="inner-baner-container" style="background-image: url({{ asset($images) }});">
    <div class="container">
      <div class="inner-banner-content">
        <h1 class="inner-title">{{$title}}</h1>
      </div>
    </div>
  </div>

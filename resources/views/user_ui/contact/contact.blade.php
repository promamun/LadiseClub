@extends('user_ui.master')
@section('title','Contact Us')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Contact Us" images="user_ui/assets/img/eventum-img1.jpg"/>
  <section class="contact-page-section">
    <div class="container">
      <div class="row align-items-lg-end align-items-center">
        <div class="col-lg-6">
          <div class="section-head">
            <span class="section-sub-title ">GET IN TOUCH</span>
            <h3 class="section-title">
              CONTACT US FOR FURTHER INFORMATION!
            </h3>
          </div>
        </div>
      </div>
      <div class="contact-deatil-list">
        <div class="connection-detail-wrapper">
          <figure class="contact-icon">
            <i class="fas fa-phone-alt"></i>
          </figure>
          <div class="contact-info-list">
            <h5 class="contact-list-title">Call Us</h5>
            <ul>
              <li>
                <a href="tel:{{$contactData->phone??''}}">{{$contactData->phone??''}}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="connection-detail-wrapper">
          <figure class="contact-icon">
            <i class="fas fa-map-marker-alt"></i>
          </figure>
          <div class="contact-info-list">
            <h5 class="contact-list-title">Our Address</h5>
            <ul>
              <li>
                {{$contactData->address??''}}
              </li>
            </ul>
          </div>
        </div>
        <div class="connection-detail-wrapper">
          <figure class="contact-icon">
            <i class="fas fa-envelope"></i>
          </figure>
          <div class="contact-info-list">
            <h5 class="contact-list-title">Email Us</h5>
            <ul>
              <li>
                <a href="mailto:{{$contactData->email??''}}">{{$contactData->email??''}}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="pb-100">
    <div class="container">
      <div class="row align-items-lg-end align-items-center">
        <div class="col-lg-6">
          <div class="section-head">
            <h3 class="section-title">
              Our Location :
            </h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <iframe src="{{$contactData->location??"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7299.898203861435!2d90.41346545366828!3d23.820408894007503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64e5249ad39%3A0x2392867b037e718e!2sKuril%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1716952529059!5m2!1sen!2sbd"}}" width="600" height="450" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
@endsection

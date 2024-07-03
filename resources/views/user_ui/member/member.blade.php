@extends('user_ui.master')
@section('title','Member')
@section('content')
  <!-- Inner Banner html start-->
  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/img/eventum-img1.jpg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Member List</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- event deatil html start-->
  <!-- home event speaker section html start -->
  <section class="custom-member-list">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="member-info">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th align="center" scope="col">IMAGE</th>
                <th align="center" scope="col">ID&nbsp;NO</th>
                <th align="center" scope="col">NAME</th>
                <th align="center" scope="col">PROFESSION</th>
                <th align="center" scope="col">MOBILE</th>
                <th align="center" scope="col">EMAIL</th>
                <th align="center" scope="col">ADDRESS</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>
                  <img src="{{asset('user_ui')}}/assets/img/member/m3.png" class="img-fluid">
                </td>
                <td>LA&nbsp;01</td>
                <td>Farzana&nbsp;Alom</td>
                <td>Teacher<br>Sena&nbsp;Palli&nbsp;High&nbsp;School</td>
                <td>01709444444</td>
                <td>farzanaalamsampa@gmail.com</td>
                <td>House 511,&nbsp;513 Flat 3B,&nbsp;Road-08,&nbsp;Mirpur DOHS,&nbsp;Mirpur,&nbsp;Dhaka 1216</td>

              </tr>
              <tr>
                <td>
                  <img src="{{asset('user_ui')}}/assets/img/member/m3.png" class="img-fluid">
                </td>
                <td>LA&nbsp;02</td>
                <td>Farzana&nbsp;Alom</td>
                <td>Teacher<br>Sena&nbsp;Palli&nbsp;High&nbsp;School</td>
                <td>01709444444</td>
                <td>farzanaalamsampa@gmail.com</td>
                <td>House 511,&nbsp;513 Flat 3B,&nbsp;Road-08,&nbsp;Mirpur DOHS,&nbsp;Mirpur,&nbsp;Dhaka 1216</td>
              </tr>
              <tr>
                <td>
                  <img src="{{asset('user_ui')}}/assets/img/member/m3.png" class="img-fluid">
                </td>
                <td>LA&nbsp;03</td>
                <td>Farzana&nbsp;Alom</td>
                <td>Teacher<br>Sena&nbsp;Palli&nbsp;High&nbsp;School</td>
                <td>01709444444</td>
                <td>farzanaalamsampa@gmail.com</td>
                <td>House 511,&nbsp;513 Flat 3B,&nbsp;Road-08,&nbsp;Mirpur DOHS,&nbsp;Mirpur,&nbsp;Dhaka 1216</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="post-navigation-wrap pb-100">
    <nav>
      <ul class="pagination">
        <li>
          <a href="#">
            <i class="fas fa-arrow-left"></i>
          </a>
        </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li>
          <a href="#">
            <i class="fas fa-arrow-right"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
@endsection

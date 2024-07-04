@extends('user_ui.master')
@php(
    $title = $categoryMember->name . ' Members'
)
@section('title',$title)
@section('content')
  <!-- Inner Banner html start-->
  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url({{asset('user_ui')}}/assets/img/eventum-img1.jpg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">{{$categoryMember->name}} Members List</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- event deatil html start-->
  <!-- home event speaker section html start -->
  @if($categoryMember->members->isEmpty())
    <section class="custom-member-list">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="member-info">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th align="center" class="text-center" scope="col">There Is No Member Found In this {{$categoryMember->name}} Category</th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  @else
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
                @foreach($categoryMember->members as $members)
                  <tr>
                    <td>
                      <img src="{{asset('member/' . $members->image)}}" class="img-fluid">
                    </td>
                    <td>{{$members->member_id??""}}</td>
                    <td>{{$members->name??''}}</td>
                    <td>{{$members->designation??''}}<br>{{$members->company_name??''}}</td>
                    <td>{{$members->phone??''}}</td>
                    <td>{{$members->email??""}}</td>
                    <td>{{$members->address??''}}</td>
                  </tr>
                @endforeach
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
  @endif
@endsection

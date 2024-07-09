@extends('user_ui.master')
@php(
    $title = $categoryMember->name . ' Members List'
)
@section('title',$title)
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="{{ $title }}" images="user_ui/assets/img/eventum-img1.jpg"/>
  <!-- event deatil html start-->
  <!-- home event speaker section html start -->
  @if($members->isEmpty())
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
                @foreach($members as $member)
                  <tr>
                    <td>
                      <img src="{{asset('member/' . $member->image)}}" class="img-fluid">
                    </td>
                    <td>{{$member->member_id??""}}</td>
                    <td>{{$member->name??''}}</td>
                    <td>{{$member->designation??''}}<br>{{$member->company_name??''}}</td>
                    <td>{{$member->phone??''}}</td>
                    <td>{{$member->email??""}}</td>
                    <td>{{$member->address??''}}</td>
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
      <x-paginator :paginator="$members"/>
    </div>
  @endif
@endsection

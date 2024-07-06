<header class="site-header site-header-transparent">
  <div class="top-header">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12 col-12">
                  <div class="custom-tb">
                      <a href="{{route('home')}}">
                          <div class="site-logo">
                              <img src="{{ asset('user_ui') }}/assets/img/logo.png" style="width: 112px;" alt="Purbachal Ladies Club LTD">
                          </div>
                      </a>
                      <div class="site-name">
                          <h1>PURBACHAL LADIES CLUB LTD.</h1>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="bottom-header" id="masthead">
      <div class="container">
          <div class="hb-group d-flex align-items-center justify-content-between">
              <div class="main-navigation col-lg-12 justify-content-between d-flex align-items-center">
                  <nav id="navigation" class="navigation d-none d-lg-inline-block">
                      <ul>
                          <li  class="{{ Request::route()->getName() === 'home' ? 'current-menu-item ': '' }}">
                              <a href="{{route('home')}}">Home</a>
                          </li>
                          <li class="{{ Request::route()->getName() === 'about.us' ? 'current-menu-item ': '' }}">
                              <a href="{{route('about.us')}}">About us</a>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Member Information</a>
                              <ul>
                                @foreach($membersData as $members)
                                  <li class="{{ Request::route()->getName() === 'members' ? 'current-menu-item ': '' }}">
                                      <a href="{{route('members',['name'=> Str::slug($members->name),'id'=>$members->id])}}">{{$members->name}} </a>
                                  </li>
                                @endforeach
                              </ul>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Facilities</a>
                              <ul>
                                @foreach($facilitiesData as $data)
                                  <li class="{{ Request::route()->getName() === 'user.facilities' ? 'current-menu-item ': '' }}">
                                      <a href="{{route('user.facilities',['name'=>Str::slug($data->name),'id'=>$data->id])}}">{{$data->name}}</a>
                                  </li>
                                @endforeach
                              </ul>
                          </li>
                          <li class="{{ Request::route()->getName() === 'event' ? 'current-menu-item ': '' }}">
                              <a href="{{route('event')}}">Event</a>
                          </li>
                          <li class="{{ Request::route()->getName() === 'notice' ? 'current-menu-item ': '' }}">
                              <a href="{{route('notice')}}">Notice</a>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Gallery</a>
                              <ul>
                                  <li class="{{ Request::route()->getName() === 'photo.gallery' ? 'current-menu-item ': '' }}">
                                      <a href="{{route('photo.gallery')}}">Photo gallery</a>
                                  </li>
                                  <li>
                                      <a href="{{ route('video.gallery') }}">Video gallery</a>
                                  </li>
                              </ul>
                          </li>
                          <li class="{{ Request::route()->getName() === 'contact' ? 'current-menu-item ': '' }}">
                              <a href="{{route('contact')}}">Contact us</a>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
      <div class="mobile-menu-container"></div>
  </div>
</header>

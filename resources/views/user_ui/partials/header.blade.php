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
                          <li class="current-menu-item">
                              <a href="{{route('home')}}">Home</a>
                          </li>
                          <li>
                              <a href="{{route('about.us')}}">About us</a>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Member Information</a>
                              <ul>
                                  <li>
                                      <a href="{{route('members')}}">EC Committee </a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Founder Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Advisory Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Foreign member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Donor Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Life Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Permanent Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Corporate Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Honorary Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">User Member</a>
                                  </li>
                                  <li>
                                      <a href="member-list.html">Associate Member</a>
                                  </li>
                              </ul>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Facilities</a>
                              <ul>
                                  <li>
                                      <a href="{{route('facilities')}}">Sports and Health</a>
                                  </li>
                                  <li>
                                      <a href="facilities.html">Restaurant</a>
                                  </li>
                                  <li>
                                      <a href="facilities.html">Entertainment</a>
                                  </li>
                                  <li>
                                      <a href="facilities.html">Kid Zone</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="{{route('event')}}">Event</a>
                          </li>
                          <li>
                              <a href="{{route('notice')}}">Notice</a>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Gallery</a>
                              <ul>
                                  <li>
                                      <a href="{{route('photo.gallery')}}">Photo gallery</a>
                                  </li>
                                  <li>
                                      <a href="video-gallery.html">Video gallery</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
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

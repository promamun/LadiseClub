<footer id="colophon" class="site-footer">
  <div class="footer-overlay overlay"></div>
  <div class="top-footer">
      <div class="container">
          <div class="row  align-items-start">
              <div class="col-lg-5 col-sm-6">
                  <aside class="widget">
                      <h6 class="widget-title">Get In Touch</h6>
                      <ul>
                          <li>
                              <i class="fas fa-phone-alt" style="margin-right: 6px;"></i><a href="tel:{{$contactData->phone??''}}">{{$contactData->phone??''}}</a>
                          </li>
                          <li>

                              <i class="far fa-envelope" style="margin-right: 6px;"></i><a href="mailto:{{$contactData->email??''}}">{{$contactData->email??''}}</a>
                          </li>
                          <li>

                              <i class="fas fa-location-arrow" style="margin-right: 6px;"></i><a href="#">{{$contactData->address??''}}</a>
                          </li>
                      </ul>
                  </aside>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <aside class="widget">
                      <h6 class="widget-title">Member Information</h6>
                      <ul>
                        @foreach($membersData as $members)
                          @break($loop->index===4)
                          <li class="{{ Request::route()->getName() === 'members' ? 'current-menu-item ': '' }}">
                            <a href="{{route('members',['slug'=> $members->slug])}}">{{$members->name}} </a>
                          </li>
                        @endforeach
                      </ul>
                  </aside>
              </div>
              <div class="col-lg-2 col-sm-6">
                  <aside class="widget">
                      <h6 class="widget-title">Quick LInks</h6>
                      <ul>
                          <li>
                              <a href="{{route('home')}}">Home</a>
                          </li>
                          <li>
                              <a href="{{route('about.us')}}">About us</a>
                          </li>
                          <li>
                              <a href="{{route('contact')}}">Contact US</a>
                          </li>
                          <li>
                              <a href="{{route('event')}}">Event</a>
                          </li>
                      </ul>
                  </aside>
              </div>
              <div class="col-lg-2 col-sm-6">
                  <aside class="widget">
                      <h6 class="widget-title">Social Media</h6>
                  </aside>
                  <div class="footer-social-links">
                      <ul>
                        @if(get_option('facebook_url'))
                          <li>
                              <a href="{{get_option('facebook_url')}}" target="_blank">
                                  <i class="fab fa-facebook-f" aria-hidden="true"></i>
                              </a>
                          </li>
                        @endif
                          @if(get_option('youtube_url'))
                          <li>
                              <a href="{{get_option('youtube_url')}}" target="_blank">
                                  <i class="fab fa-youtube" aria-hidden="true"></i>
                              </a>
                          </li>
                          @endif
                        @if(get_option('twitter_url'))
                          <li>
                            <a href="{{get_option('twitter_url')}}" target="_blank">
                              <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                        @endif
                        @if(get_option('instagram_url'))
                          <li>
                            <a href="{{get_option('instagram_url')}}" target="_blank">
                              <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                        @endif
                        @if(get_option('linkedin_url'))
                          <li>
                            <a href="{{get_option('linkedin_url')}}" target="_blank">
                              <i class="fab fa-linkedin" aria-hidden="true"></i>
                            </a>
                          </li>
                        @endif
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="bottom-footer">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-12 text-center">
                  <div style="color: #f4f4f4;font-size: 14px;">Copyright &copy; {{ date('Y') }} Purbachal Ladies Club Ltd. All rights reserved.</div>
              </div>
          </div>
      </div>
  </div>
</footer>

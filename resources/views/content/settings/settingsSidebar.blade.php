<ul class="nav nav-pills me-3" role="tablist">
  <h6 class="text-muted">Global Settings</h6>
  <li class="nav-item">
    <a href="{{ route('global-settings') }}" type="button" class="nav-link {{ Request::route()->getName() == 'global-settings' ? 'active' : '' }} ">Global Settings</a>
  </li>
  <h6 class="text-muted">Pages</h6>
  <li class="nav-item">
    <a href="{{ route('about-us') }}" type="button" class="nav-link {{ Request::route()->getName() == 'about-us' ? 'active' : '' }} ">About Us</a>
  </li>
</ul>

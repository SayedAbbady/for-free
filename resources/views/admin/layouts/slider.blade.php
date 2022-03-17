<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset("assets/images/newIcon.png")}}">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
           Cpanel
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ strpos(Request::path(),'home') ? 'active' : ''}}">
            <a href="{{route('adminhome')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ strpos(Request::path(),'unit') ? 'active' : ''}}">
            <a href="{{route('unit')}}">
              <i class="nc-icon nc-diamond"></i>
              <p>Units</p>
            </a>
          </li>
          <li class="{{ strpos(Request::path(),'section') ? 'active' : ''}}">
            <a href="{{route('section')}}">
              <i class="nc-icon nc-pin-3"></i>
              <p>Sections</p>
            </a>
          </li>
          <li class="{{ strpos(Request::path(),'level') ? 'active' : ''}}">
            <a href="{{route('level')}}">
              
              <i class="lnr lnr-book"></i>
              <p>Levels</p>
            </a>
          </li>
          <li class="{{ strpos(Request::path(),'lesson') ? 'active' : ''}}">
            <a href="{{route("lesson")}}">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Lessons</p>
            </a>
          </li>
          
          
          
          <li class="{{ strpos(Request::path(),'user') ? 'active' : ''}}">
            <a href="{{route('student')}}">
              <i class="nc-icon nc-caps-small"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="{{ strpos(Request::path(),'staff') ? 'active' : ''}}">
            <a href="{{route('staff')}}">
              <i class="nc-icon nc-caps-small"></i>
              <p>Admins</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
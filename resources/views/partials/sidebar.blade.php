<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      
      <p class="centered"><a href="profile.html"><img src="{{ url('img/admin/blank.png') }}" class="img-circle" width="60"></a></p>
      <h5 class="centered">{{ Auth::user()->username }}</h5>
      
      <li class="mt">
        <a href="{{  url('admin/manage/dashboard') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="{{ url('admin/manage/category') }}" >
          <i class="fa fa-list"></i>
          <span>Categories</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="{{ url('admin/manage/film') }}" >
          <i class="fa fa-desktop"></i>
          <span>Films</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-bar-chart-o"></i>
          <span>Status Place</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/studio') }}">Studios</a></li>
          <li><a  href="{{ url('admin/manage/row') }}">Rows</a></li>
          <li><a  href="{{ url('admin/manage/chair') }}">Chairs</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-users"></i>
          <span>Manage Users</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/admin') }}">Admins</a></li>
          <li><a  href="{{ url('admin/manage/operator') }}">Operators</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-tags"></i>
          <span>Manage Tickets</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/event') }}">Event</a></li>
          <li><a  href="{{ url('admin/manage/event/sale') }}">Tickets Sales</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class=" fa fa-bar-chart-o"></i>
          <span>About</span>
        </a>
        <ul class="sub">
          <li><a  href="morris.html">Morris</a></li>
          <li><a  href="chartjs.html">Chartjs</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->
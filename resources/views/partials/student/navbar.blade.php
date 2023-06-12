<nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">
    <div class="container">
   
        <a class="navbar-brand" href="{{ url('admin/student/welcome') }}"> <img src="/assets/img/logo.jpg" alt="logo" width="50" height="50">  {{ trans('panel.site_title') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('admin/student/welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('admin/student/history') }}">History</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                            <div class="dropdown-menu">
                                <a href="{{ url('admin/student/update_account') }}" class="dropdown-item">Update Account</a>
                                <a href="#" class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logoutform').submit();">logout</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
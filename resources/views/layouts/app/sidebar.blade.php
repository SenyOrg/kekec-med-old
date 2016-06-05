<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Auth::user()->getImageUrl()}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->getFullName()}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{HTML::activeState('root')}}"><a href="{{route('root')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{HTML::activeState('insurance.index')}}"><a href="{{route('insurance.index')}}"><i class="fa fa-hospital-o"></i> <span>Insurances</span></a></li>
            <li class="{{HTML::activeState('patient.index')}}"><a href="{{route('patient.index')}}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a></li>
            <li class="{{HTML::activeState('consultation.index')}}"><a href="{{route('consultation.index')}}"><i class="fa fa-comments"></i> <span>Consultations</span></a></li>
            <li class="{{HTML::activeState('task.index')}}"><a href="{{route('task.index')}}"><i class="ion ion-clipboard"></i> <span>Tasks</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
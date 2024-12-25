<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kapella Bootstrap Admin Dashboard Template</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/vendors/mdi/css/materialdesignicons.min.css ') }}">
    <link rel="stylesheet" href=" {{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/css/style.css') }}">
    <!-- endinject -->

    <link rel="shortcut icon" href="{{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/images/favicon.png ') }}" />
  </head>
  <body>
    <div class="container-scroller">
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0 bottom-navbar">
        <div class="container-fluid container">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src=" {{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/images/logo.svg ') }}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src=" {{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/images/logo-mini.svg  ') }}" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name">{{Auth::user()->name}}</span>
                    <span class="online-status"></span>
                    <img src="{{ asset('uploads/students/' . Auth::user()->image) }}" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a href="{{ route('profileview') }}" class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a class="dropdown-item" href="/logout">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
    </div>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
          @if(count($department) > 0)
                                   
            @foreach($department as $dept)
              <a href="{{ route('messengerGroupsView', ['id' => $dept->id]) }}" class="col-sm-3 grid-margin grid-margin-md-0 stretch-card text-decoration-none">
                  <div class="card">
                    <div class="card-body pt-5 pb-5">
                      <div class="d-flex align-items-center text-center justify-content-between">
                        <h4 class="card-title text-center">{{$dept->dept_name}}</h4>
                      </div>
                      <!-- <div id="support-tracker-legend" class="support-tracker-legend"></div>
                      <canvas id="supportTracker"></canvas> -->
                    </div>
                  </div>
              </a>                     
            @endforeach
          @else
              <div class="col-sm-12 grid-margin grid-margin-md-0 stretch-card text-decoration-none">
                  <div class="card">
                    <div class="card-body pt-5 pb-5">
                      <div class="d-flex align-items-center text-center justify-content-between">
                        <h4 class="card-title text-center">There is not Group Available!</h4>
                      </div>
                      <!-- <div id="support-tracker-legend" class="support-tracker-legend"></div>
                      <canvas id="supportTracker"></canvas> -->
                    </div>
                  </div>
              </div>                       
          @endif
						
						
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
            </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
    <!-- base:js -->
    <script src=" {{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src=" {{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
		<script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="vendors/justgage/justgage.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src=" {{asset('Kapella-Free-Bootstrap-Admin-Template-master/template/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
  </body>
</html>
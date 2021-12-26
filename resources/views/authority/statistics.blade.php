 @extends('authority.dashboard')
 @section('breadcrumb')
     <a>Statistics</a>
 @endsection
 @section('statistic_content')
     <section class="content">
         <div class="container-fluid">
             <h3 class="mb-2 text-bold">Today's Statistics</h3>
             <div class="row shadow p-3 mb-5 bg-white rounded">
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-info">
                         <div class="inner">
                             <h3>{{ $eventCountToday }}</h3>

                             <p>Events Reported Today</p>
                         </div>
                         <div class="icon">
                             <i class="far fa-flag"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                         <div class="inner">
                             <h3>{{ $eventHandledCountToday }}</h3>

                             <p>Events Handled Today</p>
                         </div>
                         <div class="icon">
                             <i class="far fa-check-square"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- /.col -->

                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner">
                             <h3>{{ $eventBeingHandledCountToday }}</h3>

                             <p>Events Being Handled Now</p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-spinner"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                         <div class="inner">
                             <h3>{{ $eventNotHandledCountToday }}</h3>

                             <p>Events Not Handled Today</p>
                         </div>
                         <div class="icon">
                             <i class="far fa-times-circle"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- /.col -->
             </div>
             <h3 class="mb-2 text-bold">General Statistics</h3>
             <div class="row shadow p-3 mb-5 bg-white rounded">
                 <div class="col-md-4 col-sm-6 col-12">
                     <div class="info-box">
                         <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Total Events Reported</span>
                             <span class="info-box-number">{{ $eventCount }}</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-4 col-sm-6 col-12">
                     <div class="info-box">
                         <span class="info-box-icon bg-success"><i class="far fa-check-square"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Total Events Handled</span>
                             <span class="info-box-number">{{ $eventHandledCount }}</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->

                 <!-- /.col -->
                 <div class="col-md-4 col-sm-6 col-12">
                     <div class="info-box">
                         <span class="info-box-icon bg-danger"><i class="far fa-times-circle"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Total Events Not Handled</span>
                             <span class="info-box-number">{{ $eventNotHandledCount }}</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
             </div>
             <h3 class="mb-2 text-bold">Department Deployment Statistics</h3>
             <div class="row shadow p-3 mb-5 bg-white rounded">
                 <div class="col-lg-4 col-6">
                     <!-- small box -->
                     <div class="small-box bg-info">
                         <div class="inner">
                             <h3>90</h3>

                             <p>Number of Cases Police Department Deployed</p>
                         </div>
                         <div class="icon">
                             <i class="fab fa-old-republic"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-4 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                         <div class="inner">
                             <h3>80</h3>

                             <p>Number of Cases Health Department Deployed</p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-ambulance"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->

                 <div class="col-lg-4 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner">
                             <h3>7</h3>

                             <p>Number of Cases Fire Department Deployed</p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-fire-extinguisher"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->

                 <!-- /.col -->
             </div>
             <h3 class="mb-2 text-bold">Event Type Statistics</h3>
             <div class="row shadow p-3 mb-5 bg-white rounded  d-flex justify-content-center align-items-center">
                 <div class="col-md-4">
                     <!-- Widget: user widget style 2 -->
                     <div class="card card-widget">
                         <div class="widget-user-header bg-info d-flex justify-content-center align-items-center">
                             <h3 class="widget-user-username p-3">Fire</h3>
                         </div>
                         <div class="card-footer p-0">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Total Reports <span class="float-right badge bg-primary">31</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Fire Department Deployed <span class="float-right badge bg-info">5</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Police Department Deployed <span class="float-right badge bg-success">12</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Health Department Deployed <span class="float-right badge bg-danger">842</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <!-- Widget: user widget style 2 -->
                     <div class="card card-widget">
                         <div class="widget-user-header bg-danger d-flex justify-content-center align-items-center">
                             <h3 class="widget-user-username p-3">Crime</h3>
                         </div>
                         <div class="card-footer p-0">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Total Reports <span class="float-right badge bg-primary">31</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Fire Department Deployed <span class="float-right badge bg-info">5</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Police Department Deployed <span class="float-right badge bg-success">12</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Health Department Deployed <span class="float-right badge bg-danger">842</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <!-- Widget: user widget style 2 -->
                     <div class="card card-widget">
                         <div class="widget-user-header bg-dark d-flex justify-content-center align-items-center">
                             <h3 class="widget-user-username p-3">Natural Events</h3>
                         </div>
                         <div class="card-footer p-0">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Total Reports <span class="float-right badge bg-primary">31</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Fire Department Deployed <span class="float-right badge bg-info">5</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Police Department Deployed <span class="float-right badge bg-success">12</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Health Department Deployed <span class="float-right badge bg-danger">842</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <!-- Widget: user widget style 2 -->
                     <div class="card card-widget">
                         <div class="widget-user-header bg-warning d-flex justify-content-center align-items-center">
                             <h3 class="widget-user-username p-3">Traffic</h3>
                         </div>
                         <div class="card-footer p-0">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Total Reports <span class="float-right badge bg-primary">31</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Fire Department Deployed <span class="float-right badge bg-info">5</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Police Department Deployed <span class="float-right badge bg-success">12</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Health Department Deployed <span class="float-right badge bg-danger">842</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <!-- Widget: user widget style 2 -->
                     <div class="card card-widget">
                         <div class="widget-user-header bg-success d-flex justify-content-center align-items-center">
                             <h3 class="widget-user-username p-3">Health</h3>
                         </div>
                         <div class="card-footer p-0">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Total Reports <span class="float-right badge bg-primary">31</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Fire Department Deployed <span class="float-right badge bg-info">5</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Police Department Deployed <span class="float-right badge bg-success">12</span>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         Health Department Deployed <span class="float-right badge bg-danger">842</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

     </section>
 @endsection

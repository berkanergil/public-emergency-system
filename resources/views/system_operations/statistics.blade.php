 @extends('layouts.dashboard')
 @section('breadcrumb')
     <a href="{{ route('statistics') }}">Statistics</a>
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
                             <h3>{{ $eventObject->countToday() }}</h3>

                             <p>Events Reported Today</p>
                         </div>
                         <div class="icon">
                             <i class="far fa-flag"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                         <div class="inner">
                             <h3>{{ $eventObject->handledCountToday() }}</h3>

                             <p>Events Handled Today</p>
                         </div>
                         <div class="icon">
                             <i class="far fa-check-square"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->

                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner text-white">
                             <h3>{{ $eventObject->beingHandledCountToday() }}</h3>

                             <p>Events Being Handled Now</p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-spinner"></i>
                         </div>

                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                         <div class="inner">
                             <h3>{{ $eventObject->notHandledCountToday() }}</h3>

                             <p>Events Not Handled Today</p>
                         </div>
                         <div class="icon">
                             <i class="far fa-times-circle"></i>
                         </div>
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
                             <span class="info-box-number">{{ $eventObject->count() }}</span>
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
                             <span class="info-box-number">{{ $eventObject->handledCount() }}</span>
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
                             <span class="info-box-number">{{ $eventObject->notHandledCount() }}</span>
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
                             <h3>{{ $staffObject->policeCount() }}</h3>

                             <p>Number of Personels Deployed for Police Department</p>
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
                             <h3>{{ $staffObject->healthCount() }}</h3>

                             <p>Number of Personels Deployed for Health Department</p>
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
                         <div class="inner text-white">
                             <h3>{{ $staffObject->fireCount() }}</h3>

                             <p>Number of Personels Deployed for Fire Department</p>
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

             <div class="card shadow p-3 mb-5 bg-white rounded ">
                 <div class="row  d-flex justify-content-center align-items-center">
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
                                             Total Reports <span
                                                 class="float-right badge bg-primary">{{ $eventObject->fireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Fire Department Deployed <span
                                                 class="float-right badge bg-info">{{ $groupEventObject->fireFireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Police Department Deployed <span
                                                 class="float-right badge bg-success">{{ $groupEventObject->firePoliceCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Health Department Deployed <span
                                                 class="float-right badge bg-danger">{{ $groupEventObject->fireHealthCount() }}</span>
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
                                             Total Reports <span
                                                 class="float-right badge bg-primary">{{ $eventObject->crimeCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Fire Department Deployed <span
                                                 class="float-right badge bg-info">{{ $groupEventObject->crimeFireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Police Department Deployed <span
                                                 class="float-right badge bg-success">{{ $groupEventObject->crimePoliceCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Health Department Deployed <span
                                                 class="float-right badge bg-danger">{{ $groupEventObject->crimeHealthCount() }}</span>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-primary d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3">Natural Events</h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Total Reports <span
                                                 class="float-right badge bg-primary">{{ $eventObject->naturalEventCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Fire Department Deployed <span
                                                 class="float-right badge bg-info">{{ $groupEventObject->naturalEventFireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Police Department Deployed <span
                                                 class="float-right badge bg-success">{{ $groupEventObject->naturalEventPoliceCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Health Department Deployed <span
                                                 class="float-right badge bg-danger">{{ $groupEventObject->naturalEventHealthCount() }}</span>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row  d-flex justify-content-center align-items-center">
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-warning d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3 text-white">Traffic</h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Total Reports <span
                                                 class="float-right badge bg-primary">{{ $eventObject->trafficCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Fire Department Deployed <span
                                                 class="float-right badge bg-info">{{ $groupEventObject->trafficFireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Police Department Deployed <span
                                                 class="float-right badge bg-success">{{ $groupEventObject->trafficPoliceCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Health Department Deployed <span
                                                 class="float-right badge bg-danger">{{ $groupEventObject->trafficHealthCount() }}</span>
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
                                             Total Reports <span
                                                 class="float-right badge bg-primary">{{ $eventObject->healthCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Fire Department Deployed <span
                                                 class="float-right badge bg-info">{{ $groupEventObject->healthFireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Police Department Deployed <span
                                                 class="float-right badge bg-success">{{ $groupEventObject->healthPoliceCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Health Department Deployed <span
                                                 class="float-right badge bg-danger">{{ $groupEventObject->healthHealthCount() }}</span>
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
                                 <h3 class="widget-user-username p-3">Other</h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Total Reports <span
                                                 class="float-right badge bg-primary">{{ $eventObject->healthCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Fire Department Deployed <span
                                                 class="float-right badge bg-info">{{ $groupEventObject->healthFireCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Police Department Deployed <span
                                                 class="float-right badge bg-success">{{ $groupEventObject->healthPoliceCount() }}</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="#" class="nav-link">
                                             Health Department Deployed <span
                                                 class="float-right badge bg-danger">{{ $groupEventObject->healthHealthCount() }}</span>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
     </section>
 @endsection

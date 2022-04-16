@extends('Admin.layout')
@section('content')

<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="filters pb-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                <h3 class="fs-22 fw-medium">Dashboard</h3>
            </div>
        </div><!-- end filters -->
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a href="{{url('admin/all-users')}}">Users</a></h5>                        <p class="fw-medium fs-15 text-black-50 lh-18">{{$count['users']}}</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->
            
            
            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a href="{{url('admin/all-scripts')}}">Scripts</a></h5>
                        <p class="fw-medium fs-15 text-black-50 lh-18">{{$count['scripts']}}</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a href="{{url('admin/pending-scripts')}}">Pending Scripts</a></h5>
                        <p class="fw-medium fs-15 text-black-50 lh-18">{{$count['pendingScripts']}}</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a href="{{url('admin/approved-scripts')}}">Approved Scripts</a></h5>
                        <p class="fw-medium fs-15 text-black-50 lh-18">{{$count['approvedScripts']}}</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a href="{{url('admin/declined-scripts')}}">Declined Scripts</a></h5>
                        <p class="fw-medium fs-15 text-black-50 lh-18">{{$count['declinedScripts']}}</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a>Comments</a></h5>
                        <p class="fw-medium fs-15 text-black-50 lh-18">{{$count['comments']}}</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
       
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->

@endsection
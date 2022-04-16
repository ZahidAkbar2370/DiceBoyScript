@include('layout/profile_header')
<style type="text/css">
.w-5 {
    width: 20px;
}
</style>
<!--======================================
        START HERO AREA
        ======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden pt-60px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-content">
                    <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 bg-transparent">
                        <div class="media-img media--img">
                            <img src="{{asset('storage/app/'.Session('user_profile'))}}" alt="avatar">
                        </div>
                        <div class="media-body">
                            <h5>{{Session('user_name')}}</h5>
                            <small class="meta d-block lh-20 pb-2">
                                <span>{{Session('user_email')}}</span>
                            </small>
                            <!-- <div class="stats fs-14 fw-medium d-flex align-items-center lh-18">
                                                                        <span class="text-black pr-2" title="Reputation">224,110</span>
                                                                        <span class="pr-2 d-inline-flex align-items-center" title="Gold"><span class="ball ml-1 gold"></span>16</span>
                                                                        <span class="pr-2 d-inline-flex align-items-center" title="Silver"><span class="ball ml-1 silver"></span>93</span>
                                                                        <span class="pr-2 d-inline-flex align-items-center" title="Bronze"><span class="ball ml-1"></span>136</span>
                                                                </div> -->
                        </div>
                    </div><!-- end media -->
                </div><!-- end hero-content -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="hero-btn-box text-right py-3">
                    <a href="{{url('editprofile')}}" class="btn theme-btn theme-btn-outline theme-btn-outline-gray"><i
                            class="la la-gear mr-1"></i> Edit Profile</a>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-12">
                <ul class="nav nav-tabs generic-tabs generic--tabs generic--tabs-2 mt-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('addscript')}}"
                          >Script list</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="user-activity-tab" data-toggle="tab" href="#user-activity" role="tab"
                            aria-controls="user-activity" aria-selected="false">Add new</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('all-favorite-scripts')}}">Favorite Scripts</a>
                    </li>
                </ul>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
        ======================================-->


<!-- ================================
         START USER DETAILS AREA
         ================================= -->
<section class="user-details-area pt-30px pb-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user-profile" role="tabpanel"
                        aria-labelledby="user-profile-tab">
                        <div class="user-panel-main-bar">
                            <div class="user-panel mb-40px">
                                <div
                                    class="bg-gray p-3 rounded-rounded d-flex align-items-center justify-content-between">
                                    <h3 class="fs-17">My Favorite Scripts <span></span></h3>
                                    <div class="summary-panel">
                                        <div class="vertical-list">


                                        </div>
                                    </div>
                                </div>
                            </div><!-- end user-panel -->
                        </div><!-- end user-panel-main-bar -->
                    </div><!-- end tab-pane -->

                    <div id="question">
                    @foreach($favorites as $key => $favorite)
                        <div class="item p-0">



                            <div class="media-body">
                            <h5><a href="{{url('script',$favorite->posts->id)}}"
                                                                class="d-flex align-items-center">
                                                                <!-- <span class="badge bg-12 mr-2 text-white">+100</span> -->
                                                                {{$favorite->posts->title ?? ''}}
                                                            </a></h5>
                                <p class="fs-15">{{$favorite->posts->description ?? ''}}</p>
                                <p class="fs-15">{!!$favorite->posts->script!!}</p>
                                <small class="meta">
                                    <span class="pr-1">{{$favorite->posts->created_at->diffForHumans() ?? ''}}</span>
                                    <a href="#" class="author">{{$favorite->users->name ?? ''}}</a>
                                </small>
                            </div>
                            
                        </div><!-- end media -->
                    @endforeach
                    </div><!-- end item -->

                </div>
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="ad-card">
                        <h4 class="text-gray text-uppercase fs-13 pb-3 text-center">Advertisements</h4>
                        <div class="ad-banner mb-4 mx-auto">
                            <span class="ad-text">290x500</span>
                        </div>
                        <div class="ad-banner mb-4 ad-banner-2 mx-auto">
                            <span class="ad-text">290x300</span>
                        </div>
                    </div><!-- end ad-card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-details-area -->
<!-- ================================
         END USER DETAILS AREA
         ================================= -->

@include('layout/footer')
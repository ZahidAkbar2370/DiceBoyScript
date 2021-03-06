@if(session()->has('user_id'))
   @include('layout/profile_header')
@else 
    @include('layout/header')
@endif
<style type="text/css">
    .w-5{
        width: 20px;
    }
</style>
<!--======================================
        START HERO AREA
        ======================================-->
        <div class="ad-banner mb-4 mx-auto" style="width: 93%; height: 200px">
            <span class="ad-text">1350x500</span>
        </div>
<!--======================================
        END HERO AREA
        ======================================-->

<!-- ================================
         START QUESTION AREA
         ================================= -->
         <section class="question-area pt-25px pb-40px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                     <div class="sidebar pb-45px position-sticky top-0 mt-2">
                         <ul class="generic-list-item generic-list-item-highlight fs-15">
                           <li class="lh-26 active"><a href="{{url('/')}}"><i class="la la-home mr-1 text-black"></i> Home</a></li>
                           <!-- <li class="lh-26"><a href="#"><i class="la la-file-text mr-1 text-black"></i> All Topics</a></li> -->
                       </ul>
                   </div><!-- end sidebar -->
               </div><!-- end col-lg-2 -->
               <div class="col-lg-7">
                <div class="question-tabs mb-50px">
                    <ul class="nav nav-tabs generic-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item"><div class="anim-bar"></div></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="true">Scripts</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-40px" id="myTabContent">
                        <div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                            <div class="filters d-flex align-items-center justify-content-between pb-4">
                                <h3 class="fs-17 fw-medium">All Scripts</h3>
                                <div class="filter-option-box w-20">
                                    <form method="post" id="order_by" onsubmit="return submitForm()">
                                    <select id="order_by_select" class="select-container orderBy" name="orderBy">
                                        <option value="1" selected="selected">Newest </option>
                                        <option value="2">Oldest</option>
                                        <option value="3">A to Z</option>
                                        <option value="4">Z to A </option>
                                        <option value="5">High Rating</option>
                                        <option value="6">Low Rating </option>
                                    </select>
                                </form>
                                </div><!-- end filter-option-box -->
                            </div><!-- end filters -->
                            <div class="question-main-bar">
                                <div id="question">
                                 @foreach($posts as $key => $post)
                                <div class="questions-snippet">
                                    <div class="media media-card media--card align-items-center">
                                        <div class="votes">
                                            <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">

                                                @if($stars[$key] != 0)
                                                    <span class="vote-counts">{{$stars[$key]}}</span>
                                                    <span><i class="la la-star" style="color:orange;"></i></span>
                                                @else
                                                    <span class="vote-counts">{{$stars[$key]}}</span>
                                                    <span><i class="la la-star"></i></span>
                                                @endif

                                            </div>
                                            <div class="answer-block d-flex align-items-center justify-content-between" title="Comments">
                                                <span class="vote-counts">{{$comments[$key]}}</span>
                                                <span><i class="la la-comments"></i></span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="fs-10 pt-3 pr-3 script-description"><a href="{{url('script/'.$post->id)}}">{{substr($post->title,0,60)}}.....</a></h5>
                                             <p class="fs-10 pt-3 script-description">{{$post->description}}</p>
                                             <div class="fs-10 pt-3 script-description">
                                              {!!$post->script!!}
                                          </div>
                                            <small class="meta">
                                                <span class="pr-1">{{$post->created_at->diffForHumans()}}</span>
                                                <a class="author">{{$post->users->name ?? ''}}</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                                </div>
                                <div class="pager d-flex flex-wrap align-items-center justify-content-between pt-30px">
                                    <div>
                                        {{$posts->links()}}
                                        
                                        <!-- <p class="fs-13 pt-3">Showing 1-15 results of 50,577 Scripts</p> -->
                                    </div>
                                </div>
                            </div><!-- end question-main-bar -->
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
                            <p class="fs-15 pb-2"><span class="fw-medium text-black">Developers first.</span> You???ll never receive recruiter spam or see fake job listings on our site.</p>
                            <p class="fs-15 pb-4"><span class="fw-medium text-black">Find a job by</span> <a href="companies.html" class="btn-text">companies<i class="la la-arrow-right icon ml-1 fs-14"></i></a></p>
                            <div class="filters pb-4">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <form method="post" class="flex-grow-1 mr-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control form--control form-control-sm h-auto lh-34" type="text" name="search" placeholder="Type here to find jobs...">
                                            <button class="form-btn" type="button"><i class="la la-search"></i></button>
                                        </div>
                                    </form>
                                    <div class="filter-option-box">
                                        <a class="btn theme-btn theme-btn-outline theme-btn-outline-gray" data-toggle="collapse" href="#collapseSearchAdvanced" role="button" aria-expanded="false" aria-controls="collapseSearchAdvanced">
                                            <i class="la la-gear mr-1"></i> Filters
                                        </a>
                                    </div>
                                </div><!-- end d-flex -->
                                <div class="collapse pt-3" id="collapseSearchAdvanced">
                                    <div class="card card-item mb-0">
                                        <form method="post" class="search-advanced card-body pb-1">
                                            <div class="search-advanced-item mb-10px row align-items-center">
                                                <div class="col-lg-6">
                                                    <h4 class="fs-16">Filters</h4>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="search-filter-btn-box text-right">
                                                        <button type="submit" class="btn theme-btn theme-btn-sm">Search <i class="la la-search ml-1"></i></button>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Location</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Distance</label>
                                                        <div class="form-group">
                                                            <select class="select-container">
                                                                <option value="5">within 5 km</option>
                                                                <option value="10">within 10 km</option>
                                                                <option selected="selected" value="20">within 20 km</option>
                                                                <option value="50">within 50 km</option>
                                                                <option value="100">within 100 km</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">City</label>
                                                        <div class="form-group">
                                                            <select class="select-container">
                                                                <option selected="selected" value="1">New york</option>
                                                                <option value="2">Austin</option>
                                                                <option value="3">Chicago</option>
                                                                <option value="4">Boston</option>
                                                                <option value="5">Denver</option>
                                                                <option value="6">Berlin</option>
                                                                <option value="7">Munich</option>
                                                                <option value="8">Hamburg</option>
                                                                <option value="9">Cologne</option>
                                                                <option value="10">Rome</option>
                                                                <option value="11">Turin</option>
                                                                <option value="12">Milan</option>
                                                                <option value="13">Florence</option>
                                                                <option value="14">Bologna</option>
                                                                <option value="15">Marylebone</option>
                                                                <option value="16">Southwark</option>
                                                                <option value="16">Westminster</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Tech</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Tech You Like</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm" type="text" name="text" placeholder="e.g. javascript">
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Tech You Dislike</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm" type="text" name="text" placeholder="e.g. java">
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Compensation</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Minimum Annual Salary</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm" type="text" name="text" placeholder="e.g. 35">
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Currency</label>
                                                        <div class="form-group">
                                                            <select class="select-container">
                                                                <option selected="selected" value="BDT">BDT</option>
                                                                <option value="USD">USD ($)</option>
                                                                <option value="EUR">EUR (???)</option>
                                                                <option value="GBP">GBP (??)</option>
                                                                <option value="CAD">CAD (C$)</option>
                                                                <option value="AUD">AUD (A$)</option>
                                                                <option value="INR">INR (???)</option>
                                                                <option value="SEK">SEK (kr)</option>
                                                                <option value="PLN">PLN (z??)</option>
                                                                <option value="CHF">CHF</option>
                                                                <option value="DKK">DKK</option>
                                                                <option value="NZD">NZD</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="form-group col-lg-12">
                                                        <div class="custom-control custom-checkbox fs-13">
                                                            <input type="checkbox" class="custom-control-input" id="offersEquity">
                                                            <label class="custom-control-label custom--control-label" for="offersEquity">Offers Equity</label>
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Perks</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Location options</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="allowsRemote">
                                                                <label class="custom-control-label custom--control-label" for="allowsRemote">Allows remote</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="offersRelocation">
                                                                <label class="custom-control-label custom--control-label" for="offersRelocation">Offers relocation</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="offersVisaSponsorship">
                                                                <label class="custom-control-label custom--control-label" for="offersVisaSponsorship">Offers visa sponsorship</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Perks</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="educationAndTuitionBenefits">
                                                                <label class="custom-control-label custom--control-label" for="educationAndTuitionBenefits">Education and tuition benefits</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="vacationDays10Plus">
                                                                <label class="custom-control-label custom--control-label" for="vacationDays10Plus">10+ vacation days</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="gymAndFitnessPerks">
                                                                <label class="custom-control-label custom--control-label" for="gymAndFitnessPerks">Gym and fitness perks</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Background</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Experience Level Min</label>
                                                        <div class="form-group">
                                                            <select class="select-container">
                                                                <option selected="selected" value="">Select min. experience</option>
                                                                <option value="Student">Student</option>
                                                                <option value="Junior">Junior</option>
                                                                <option value="MidLevel">Mid-Level</option>
                                                                <option value="Senior">Senior</option>
                                                                <option value="Lead">Lead</option>
                                                                <option value="Manager">Manager</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Experience Level Max</label>
                                                        <div class="form-group">
                                                            <select class="select-container">
                                                                <option selected="selected" value="">Select max. experience</option>
                                                                <option value="Student">Student</option>
                                                                <option value="Junior">Junior</option>
                                                                <option value="MidLevel">Mid-Level</option>
                                                                <option value="Senior">Senior</option>
                                                                <option value="Lead">Lead</option>
                                                                <option value="Manager">Manager</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Role</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="backendDeveloper">
                                                                <label class="custom-control-label custom--control-label" for="backendDeveloper">Backend Developer</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="dataScientist">
                                                                <label class="custom-control-label custom--control-label" for="dataScientist">Data Scientist</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="databaseAdministrator">
                                                                <label class="custom-control-label custom--control-label" for="databaseAdministrator">Database Administrator</label>
                                                            </div>
                                                            <div class="collapse" id="collapseMore">
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Designer">
                                                                    <label class="custom-control-label custom--control-label" for="Designer">Designer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="DesktopDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="DesktopDeveloper">Desktop Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="DevOps">
                                                                    <label class="custom-control-label custom--control-label" for="DevOps">DevOps</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="EmbeddedDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="EmbeddedDeveloper">Embedded Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="FrontendDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="FrontendDeveloper">Frontend Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="FullStackDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="FullStackDeveloper">Full Stack Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="GraphicsGameDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="GraphicsGameDeveloper">Graphics/Game Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="MobileDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="MobileDeveloper">Mobile Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="ProductManager">
                                                                    <label class="custom-control-label custom--control-label" for="ProductManager">Product Manager</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="QATestDeveloper">
                                                                    <label class="custom-control-label custom--control-label" for="QATestDeveloper">QA/Test Developer</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="SystemAdministrator">
                                                                    <label class="custom-control-label custom--control-label" for="SystemAdministrator"> System Administrator</label>
                                                                </div>
                                                            </div><!-- end collapse -->
                                                            <a class="collapse-btn fs-13" data-toggle="collapse" href="#collapseMore" role="button" aria-expanded="false" aria-controls="collapseMore">
                                                                <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-11"></i></span>
                                                                <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-11"></i></span>
                                                            </a>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Job Type</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="FullTime">
                                                                <label class="custom-control-label custom--control-label" for="FullTime">Full-time</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="PartTime">
                                                                <label class="custom-control-label custom--control-label" for="PartTime">Part-time</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="Contract">
                                                                <label class="custom-control-label custom--control-label" for="Contract">Contract</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="Internship">
                                                                <label class="custom-control-label custom--control-label" for="Internship">Internship</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Companies</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Companies to Include</label>
                                                        <div class="form-group">
                                                            <input class="input-tags" type="text" name="text" placeholder="Add up to 5 (e.g. Initrode)">
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Companies to Exclude</label>
                                                        <div class="form-group">
                                                            <input class="input-tags" type="text" name="text" placeholder="Add up to 5 (e.g. Initech)">
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-12">
                                                        <label class="fs-13 text-black lh-20">Industries</label>
                                                        <div class="form-group row">
                                                            <div class="col-lg-4">
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Accounting">
                                                                    <label class="custom-control-label custom--control-label" for="Accounting">Accounting</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Advertising">
                                                                    <label class="custom-control-label custom--control-label" for="Advertising">Advertising</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Aerospace">
                                                                    <label class="custom-control-label custom--control-label" for="Aerospace">Aerospace</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Agriculture">
                                                                    <label class="custom-control-label custom--control-label" for="Agriculture">Agriculture</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Architecture">
                                                                    <label class="custom-control-label custom--control-label" for="Architecture">Architecture</label>
                                                                </div>
                                                            </div><!-- end col-lg-4 -->
                                                            <div class="col-lg-4">
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Arts">
                                                                    <label class="custom-control-label custom--control-label" for="Arts">Arts</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Automotive">
                                                                    <label class="custom-control-label custom--control-label" for="Automotive">Automotive</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="CustomerService">
                                                                    <label class="custom-control-label custom--control-label" for="CustomerService">Customer Service</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Data&Analytics">
                                                                    <label class="custom-control-label custom--control-label" for="Data&Analytics">Data & Analytics</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Finance">
                                                                    <label class="custom-control-label custom--control-label" for="Finance">Finance</label>
                                                                </div>
                                                            </div><!-- end col-lg-4 -->
                                                            <div class="col-lg-4">
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Food&Beverage">
                                                                    <label class="custom-control-label custom--control-label" for="Food&Beverage">Food & Beverage</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Gaming">
                                                                    <label class="custom-control-label custom--control-label" for="Gaming">Gaming</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Government">
                                                                    <label class="custom-control-label custom--control-label" for="Government">Government</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Hardware">
                                                                    <label class="custom-control-label custom--control-label" for="Hardware">Hardware</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input" id="Health&Fitness">
                                                                    <label class="custom-control-label custom--control-label" for="Health&Fitness">Health & Fitness</label>
                                                                </div>
                                                            </div><!-- end col-lg-4 -->
                                                            <div class="col-lg-12">
                                                                <div class="collapse" id="collapseMoreTwo">
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="HealthCare">
                                                                                <label class="custom-control-label custom--control-label" for="HealthCare">Health Care</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="HomeAndGarden">
                                                                                <label class="custom-control-label custom--control-label" for="HomeAndGarden">Home and Garden</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Hospitality">
                                                                                <label class="custom-control-label custom--control-label" for="Hospitality">Hospitality</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="InformationTechnology">
                                                                                <label class="custom-control-label custom--control-label" for="InformationTechnology">Information Technology</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Insurance">
                                                                                <label class="custom-control-label custom--control-label" for="Insurance">Insurance</label>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-4">
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="LanguageServices">
                                                                                <label class="custom-control-label custom--control-label" for="LanguageServices">Language Services</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Legal">
                                                                                <label class="custom-control-label custom--control-label" for="Legal">Legal</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="LifeSciences">
                                                                                <label class="custom-control-label custom--control-label" for="LifeSciences">Life Sciences</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="LocationServices">
                                                                                <label class="custom-control-label custom--control-label" for="LocationServices">Location Services</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Logistics&Distribution">
                                                                                <label class="custom-control-label custom--control-label" for="Logistics&Distribution">Logistics & Distribution</label>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-4">
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Manufacturing">
                                                                                <label class="custom-control-label custom--control-label" for="Manufacturing">Manufacturing</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Marketing">
                                                                                <label class="custom-control-label custom--control-label" for="Marketing">Marketing</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Media">
                                                                                <label class="custom-control-label custom--control-label" for="Media">Media</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Meteorology">
                                                                                <label class="custom-control-label custom--control-label" for="Meteorology">Meteorology</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox fs-13">
                                                                                <input type="checkbox" class="custom-control-input" id="Mobile">
                                                                                <label class="custom-control-label custom--control-label" for="Mobile">Mobile</label>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end collapse -->
                                                                <a class="collapse-btn fs-13" data-toggle="collapse" href="#collapseMoreTwo" role="button" aria-expanded="false" aria-controls="collapseMoreTwo">
                                                                    <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-11"></i></span>
                                                                    <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-11"></i></span>
                                                                </a>
                                                            </div><!-- end col-lg-12 -->
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                            <div class="search-advanced-item">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">More</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-3">
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Applications</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="BeOneOfTheFirstApplicants">
                                                                <label class="custom-control-label custom--control-label" for="BeOneOfTheFirstApplicants">Be one of the first applicants</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="input-box col-lg-6">
                                                        <label class="fs-13 text-black lh-20">Responses</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="HighResponseRate">
                                                                <label class="custom-control-label custom--control-label" for="HighResponseRate">High response rate</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div><!-- end search-advanced-item -->
                                        </form>
                                    </div><!-- end card -->
                                </div><!-- end collapse -->
                                <div class="d-flex flex-wrap align-items-center justify-content-between pt-4">
                                    <h3 class="fs-17 fw-medium">572 results</h3>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container">
                                            <option value="matches" selected="selected">Matches </option>
                                            <option value="newest">Newest</option>
                                            <option value="salary">Salary</option>
                                        </select>
                                    </div>
                                </div><!-- end d-flex -->
                            </div><!-- end filters -->
                            <div class="jobs-main-bar">
                                <div class="jobs-snippet">
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">React Native Engineer at sustainable mobility Start-up (m/f/x)</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>20 mins ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">??30k - 50k</span>
                                                <span class="pr-1 text-success">| Equity</span>
                                                <span class="pr-1 text-danger">Visa sponsor</span>
                                                <span class="text-info">Paid relocation</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Front-End Engineer (Remote)</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">???60k - 70k</span>
                                                <span class="pr-1 text-warning">Remote</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">html5</a>
                                                <a href="#" class="tag-link">css</a>
                                                <a href="#" class="tag-link">angular</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Senior Java Web Developer</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>5d ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-danger">Visa sponsor</span>
                                                <span class="pl-1 text-info">Paid relocation</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Software Engineer, Full Stack</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>3w ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-danger">Visa sponsor</span>
                                                <span class="text-info">Paid relocation</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Senior Full-Stack (PHP, Node, React) Engineer (Remote)</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-warning">Remote</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Join G2i as a 100% Remote React Engineer (Native or Web) | Fully Remote Position</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-warning">Remote</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">React Native Developer</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-danger"> Visa sponsor</span>
                                                <span class="text-info">Paid relocation</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Software Engineer - Fullstack</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-danger">Visa sponsor</span>
                                                <span class="text-info">Paid relocation</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">PHP & MySQL & HTML/CSS & JS Developers</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-danger">Visa sponsor</span>
                                                <span class="text-info">Paid relocation</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card align-items-center">
                                        <div class="media-body border-left-0">
                                            <h5 class="pb-1"><a href="career-details.html">Web Developer (m/w/d) Magento/Shopware - REMOTE</a></h5>
                                            <small class="meta d-block lh-20 pb-1">
                                                <a href="company-details.html" class="author">Fintech Firm</a>
                                                <span class="px-1">-</span>
                                                <span>Amsterdam, Netherlands</span>
                                                <span class="px-1">-</span>
                                                <span>1 hour ago</span>
                                            </small>
                                            <small class="meta d-block lh-20">
                                                <span class="pr-1 text-success fw-medium">$25k - 65k</span>
                                                <span class="pr-1 text-warning">Remote</span>
                                            </small>
                                            <div class="tags pt-2">
                                                <a href="#" class="tag-link">javascript</a>
                                                <a href="#" class="tag-link">react-native</a>
                                                <a href="#" class="tag-link">typescript</a>
                                                <a href="#" class="tag-link">node.js</a>
                                            </div>
                                        </div>
                                    </div><!-- end media -->
                                </div><!-- end jobs-snippet -->
                                <div class="pager d-flex flex-wrap align-items-center justify-content-between pt-30px pb-20px">
                                    <div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination generic-pagination pr-1">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <p class="fs-13 pt-3">Showing 1-10 results of 1,577 jobs</p>
                                    </div>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container">
                                            <option selected="" value="10">10 per page</option>
                                            <option value="20">20 per page</option>
                                            <option value="30">30 per page</option>
                                            <option value="40">40 per page</option>
                                            <option value="50">50 per page</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="related-links pb-4">
                                    <div class="related-links-item fs-13 lh-18 mb-1">
                                        <span class="text-black fw-medium pr-1">Popular Searches:</span>
                                        <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-inline">
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">javascript developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">postgresql developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">node.js developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">c# developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">reactjs developer jobs</a></li>
                                        </ul>
                                    </div><!-- end related-links-item -->
                                    <div class="related-links-item fs-13 lh-18 mb-1">
                                        <span class="text-black fw-medium pr-1">Experience Level:</span>
                                        <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-inline">
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Student developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Junior developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Senior developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Lead developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Manager developer jobs</a></li>
                                        </ul>
                                    </div><!-- end related-links-item -->
                                    <div class="related-links-item fs-13 lh-18 mb-1">
                                        <span class="text-black fw-medium pr-1">Top Cities:</span>
                                        <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-inline">
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Developer jobs in Munich, Germany</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Developer jobs in Barcelona, Spain</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Developer jobs in New York, NY</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">Developer jobs in Hamburg, Germany</a></li>
                                        </ul>
                                    </div><!-- end related-links-item -->
                                    <div class="related-links-item fs-13 lh-18">
                                        <span class="text-black fw-medium pr-1">Top Technologies:</span>
                                        <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-inline">
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">sql developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">android developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">typescript developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">react-native developer jobs</a></li>
                                            <li class="lh-18 mb-1 d-inline-block"><a href="#" class="hover-underline">rust developer jobs</a></li>
                                        </ul>
                                    </div><!-- end related-links-item -->
                                </div><!-- end related-links -->
                            </div><!-- end jobs-main-bar -->
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                            <div class="filters pb-4">
                                <h3 class="fs-17 fw-medium pb-2">Tags</h3>
                                <p class="fs-15 lh-24 pb-4">A tag is a keyword or label that categorizes your question with other, similar questions.
                                    Using the right tags makes it easier for others to find and answer your question.
                                </p>
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <form method="post" class="flex-grow-1 mr-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control form--control form-control-sm h-auto lh-34" type="text" name="search" placeholder="Filter by tag name...">
                                            <button class="form-btn" type="button"><i class="la la-search"></i></button>
                                        </div>
                                    </form>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container mt-2">
                                            <option value="popular" selected="selected">Popular</option>
                                            <option value="name">Name</option>
                                            <option value="new">New</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end filters -->
                            <div class="tags-main-bar">
                                <div class="tags-snippet">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">javascript</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        For questions regarding programming in ECMAScript (JavaScript/JS) and its various dialects/implementations (excluding ActionScript). Please include all relevant tags on your question; e.g., [node.js],???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">java</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a high-level programming language. Use this tag when you're having problems using or understanding the language itself. This tag is rarely used alone and is most often used in conjunction with???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">python</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a multi-paradigm, dynamically typed, multipurpose programming language. It is designed to be quick to learn, understand, and use, and enforce a clean and uniform syntax. Please note that Pyt???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">c#</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a high level, statically typed, multi-paradigm programming language developed by Microsoft. C# code usually targets Microsoft's .NET family of tools and run-times, which???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">php</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a widely used, high-level, dynamic, object-oriented, and interpreted scripting language primarily designed for server-side web development. Used for questions about the PHP language.
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">android</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        Google's mobile operating system, used for programming or developing digital devices (Smartphones, Tablets, Automobiles, TVs, Wear, Glass, IoT). For topics related to Android, use Android-s???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">html</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        the markup language for creating web pages and other information to be displayed in a web browser. Questions regarding HTML should include a minimal reproducible ex???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">jquery</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a JavaScript library, consider also adding the JavaScript tag. jQuery is a popular cross-browser JavaScript library that facilitates Document Object Model (DOM) traversal, event handling???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">c++</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a general-purpose programming language. It was originally designed as an extension to C and has a similar syntax, but it is now a completely different language. Use this tag for questions about???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card card-item">
                                                <div class="card-body">
                                                    <div class="tags pb-1">
                                                        <a href="#" class="tag-link tag-link-md tag-link-blue">css</a>
                                                    </div>
                                                    <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                        a representation style sheet language used for describing the look and formatting of HTML (HyperText Markup Language), XML (Extensible Markup Language) documents and SV???
                                                    </p>
                                                    <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                        <p class="pr-1 lh-18">2177849 questions</p>
                                                        <p class="lh-18">901 asked today, 5319 this week</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </div><!-- end tags-snippet -->
                                <div class="pager d-flex align-items-center justify-content-between pt-10px pb-30px">
                                    <div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination generic-pagination pr-1">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <p class="fs-13 pt-3">Showing 1-10 results of 50,577 tags</p>
                                    </div>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container">
                                            <option selected="" value="10">10 per page</option>
                                            <option value="20">20 per page</option>
                                            <option value="30">30 per page</option>
                                            <option value="40">40 per page</option>
                                            <option value="50">50 per page</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end tags-main-bar -->
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="filters pb-4">
                                <h3 class="fs-17 fw-medium pb-4">Users</h3>
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <form method="post" class="flex-grow-1 mr-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control form--control form-control-sm h-auto lh-34" type="text" name="search" placeholder="Filter by user...">
                                            <button class="form-btn" type="button"><i class="la la-search"></i></button>
                                        </div>
                                    </form>
                                    <div class="filter-option-box w-20 mt-2">
                                        <select class="select-container">
                                            <option value="reputation" selected="selected">Reputation</option>
                                            <option value="new-users">New users</option>
                                            <option value="voters">Voters</option>
                                            <option value="editors">Editors</option>
                                            <option value="moderators">Moderators</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end filters -->
                            <div class="users-main-bar">
                                <div class="users-snippet">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Sector labs</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo2.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Barmar</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">CertainPerformance</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo2.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">mck</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo3.jpg" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">LoicTheAztec</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo4.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">G??nter Z??chbauer</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Suragch</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo2.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Martijn Pieters</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo3.jpg" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Frank van Puffelen</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo4.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Igor Goyda</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Sector labs</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo2.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Barmar</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">CertainPerformance</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo2.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">mck</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo3.jpg" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">LoicTheAztec</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo4.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">G??nter Z??chbauer</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Suragch</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo2.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Martijn Pieters</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo3.jpg" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Frank van Puffelen</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="media media-card p-3">
                                                <a href="#" class="media-img d-inline-block">
                                                    <img src="images/company-logo4.png" alt="company logo">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="fs-16 fw-medium"><a href="user-profile.html">Igor Goyda</a></h5>
                                                    <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                    <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </div><!-- end users-snippet -->
                                <div class="pager d-flex align-items-center justify-content-between pt-10px pb-30px">
                                    <div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination generic-pagination pr-1">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <p class="fs-13 pt-3">Showing 1-20 results of 50,577 users</p>
                                    </div>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container">
                                            <option value="10">10 per page</option>
                                            <option selected="" value="20">20 per page</option>
                                            <option value="30">30 per page</option>
                                            <option value="40">40 per page</option>
                                            <option value="50">50 per page</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end users-main-bar -->
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="badges" role="tabpanel" aria-labelledby="badges-tab">
                            <div class="filters pb-4">
                                <h3 class="fs-17 fw-medium pb-2">Badges</h3>
                                <p class="fs-15 lh-24 pb-4">Besides gaining reputation with your questions and"Comments, you receive badges for being especially helpful. Badges appears on your profile page, questions &"Comments.</p>
                                <div class="filter-option-box w-20">
                                    <select class="select-container">
                                        <option value="all" selected="selected">All</option>
                                        <option value="bronze">Bronze</option>
                                        <option value="silver">Silver</option>
                                        <option value="gold">Gold</option>
                                    </select>
                                </div>
                            </div><!-- end filters -->
                            <div class="badges-main-bar">
                                <div class="badges-snippet">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Altruist</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First bounty you manually award on another person's question</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Analytical</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>43587</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Visited every section of the FAQ</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Announcer</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>227641</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Share a link to a post later visited by 25 unique IP addresses</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Archaeologist</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>2514</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Edit 100 posts that were inactive for 6 months</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Autobiographer</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>1367031</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Complete "About Me" section of user profile</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Benefactor</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>48793</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First bounty you manually award on your own question</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Beta</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Voted 10 times, added 3 posts score > 0, and visited the site on 3 separate days during the private beta</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Booster</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Share a link to a post later visited by 300 unique IP addresses</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Census</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Completed the annual Disilab survey; your responses are anonymous</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Citizen Patrol</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First flagged post</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Civic Duty</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Vote 300 or more times</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Cleanup</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First rollback</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Commentator</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Leave 10 comments</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-3"></span> Constable</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>0</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Served as a pro-tem moderator for at least 1 year or through site graduation</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-3"></span> Copy Editor</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Edit 500 posts (excluding own or deleted posts and tag edits)</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Critic</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First down vote</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Curious</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Ask a well-received question on 5 separate days, and maintain a positive question record</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Deputy</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Raise 80 helpful flags</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Disciplined</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Delete own post with score of 3 or higher</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Documentation Beta</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Contributed 3+ substantive pieces of documentation during the private beta</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Documentation Pioneer</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Contributed 3+ substantive pieces of documentation in the first month of documentation</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Editor</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First edit</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Favorite Question</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Question bookmarked by 25 users</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="card card-item">
                                                <div class="card-body p-3">
                                                    <div class="badge-item">
                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Generalist</a>
                                                        <span class="item-multiplier fs-13 fw-medium">
                                                            <span>??</span>
                                                            <span>32924</span>
                                                        </span>
                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Provide non-wiki"Comments of 15 total score in 20 of top 40 tags</p>
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-12 pb-40px">
                                            <div class="collapse" id="collapseMoreBadges">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Good Answer</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Answer score of 25 or more</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Good Question</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Question score of 25 or more</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Guru</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Accepted answer and score of 40 or more</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Scholar</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Ask a question and accept an answer</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Self-Learner</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Answer your own question with score of 3 or more</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Sportsmanship</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Up vote 100"Comments on questions where an answer of yours has a positive score</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-3"></span> Stellar Question</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Question bookmarked by 100 users</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Student</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">First question with score of 1 or more</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Supporter</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">First up vote</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Tag Editor</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">First tag wiki edit</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Taxonomist</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Create a tag used by 50 questions</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Teacher</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Answer a question with score of 1 or more</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Tenacious</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Zero score accepted"Comments: more than 5 and 20% of total</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Tumbleweed</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Asked a question with zero score, no"Comments, no comments, and low views for a week</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Vox Populi</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Use the maximum 40 votes in a day</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4">
                                                        <div class="card card-item">
                                                            <div class="card-body p-3">
                                                                <div class="badge-item">
                                                                    <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Yearling</a>
                                                                    <span class="item-multiplier fs-13 fw-medium">
                                                                        <span>??</span>
                                                                        <span>32924</span>
                                                                    </span>
                                                                    <p class="fs-13 lh-18 pt-2 text-black-50">Active member for a year, earning at least 200 reputation</p>
                                                                </div>
                                                            </div><!-- end card-body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col-lg-4 -->
                                                </div>
                                            </div>
                                            <a class="collapse-btn btn theme-btn theme-btn-sm text-white w-100" data-toggle="collapse" href="#collapseMoreBadges" role="button" aria-expanded="false" aria-controls="collapseMoreBadges">
                                                <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-11"></i></span>
                                                <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-11"></i></span>
                                            </a>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </div><!-- end badges-snippet -->
                            </div><!-- end badges-main-bar -->
                        </div><!-- end tab-pane -->
                    </div><!-- end tab-content -->
                </div><!-- end question-tabs -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="ad-card">
                        <h4 class="text-gray text-uppercase fs-13 pb-3 text-center">Advertisements</h4>
                        <div class="ad-banner mb-4 mx-auto">
                            <span class="ad-text">290x500</span>
                        </div>
                    </div><!-- end ad-card -->
                    <div class="ad-card">
                        <h4 class="text-gray text-uppercase fs-13 pb-3 text-center">Advertisements</h4>
                        <div class="ad-banner mb-4 mx-auto">
                            <span class="ad-text">290x500</span>
                        </div>
                    </div><!-- end ad-card -->
                    <div class="ad-card">
                        <h4 class="text-gray text-uppercase fs-13 pb-3 text-center">Advertisements</h4>
                        <div class="ad-banner mb-4 mx-auto">
                            <span class="ad-text">290x500</span>
                        </div>
                    </div><!-- end ad-card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
         ================================= -->

<!-- ================================
         START CTA AREA
         ================================= -->

<!-- ================================
         END CTA AREA
         ================================= -->

         @include('layout/footer')
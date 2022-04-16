@include('layout/profile_header')

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
                                                        </div>
                                                </div><!-- end media -->
                                        </div><!-- end hero-content -->
                                </div><!-- end col-lg-8 -->
                                <div class="col-lg-4">
                                        <div class="hero-btn-box text-right py-3">
                                                <a href="{{url('editprofile')}}" class="btn theme-btn theme-btn-outline theme-btn-outline-gray"><i class="la la-gear mr-1"></i> Edit Profile</a>
                                        </div>
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-12">
                                        <ul class="nav nav-tabs generic-tabs generic--tabs generic--tabs-2 mt-4" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                        <a class="nav-link active" id="user-profile-tab" href="{{url('addscript')}}">Script list</a>
                                                </li>
                                                <li class="nav-item">
                        <a class="nav-link active" href="{{url('all-favorite-scripts)}}" aria-controls="user-profile" aria-selected="true">Favorite Scripts</a>
                    </li>
                                        </ul>
                                </div><!-- end col-lg-4 -->
                        </div><!-- end row -->
                </div><!-- end container -->
        </section>
<!--======================================
        END HERO AREA
        ======================================-->



<!-- <div class="tab-pane fade" id="user-activity" role="tabpanel" aria-labelledby="user-activity-tab"> -->
         <div class="user-panel-main-bar mt-6">

                <div class="container">
                       <div class="filters pb-40px d-flex flex-wrap align-items-center justify-content-between">
                              <h3 class="fs-22 fw-medium mr-0 mt-5">Edit Script</h3>
                      </div><!-- end filters -->
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>    
                              <strong>{{ $message }}</strong>
                      </div>
                      @endif
                      <form action="{{url('update-script')}}" class="row" method="post">
                              @csrf
                              <div class="col-lg-12">
                                     <div class="card card-item">
                                            <div class="card-body">
                                                   <div class="form-group">
                                                          <label class="fs-14 text-black fw-medium lh-20">Title</label>
                                                          <input type="hidden" name="id" value="{{$post->id}}">
                                                          <!--  <input type="text" name="title" class="form-control form--control fs-14" placeholder="Please choose an appropriate title for the post."> -->
                                                          <input 
                                                          class="@error('title')  is-invalid  @enderror form-control form--control fs-14" 
                                                          type="text" 
                                                          name="title" 
                                                          placeholder="Enter Script title"
                                                          value="{{$post->title ?? old('title')}}">
                                                          @error('title')
                                                          <div class="alert alert-danger">{{ $message }}</div>
                                                          @enderror
                                                  </div><!-- end form-group -->
                                                  <div class="form-group">
                                                          <label class="fs-14 text-black fw-medium lh-20">Description</label>
                                                          <!-- <input type="text" name="description" class="form-control form--control fs-14" placeholder="Please choose an appropriate title for the post."> -->
                                                          <input 
                                                          class="@error('description')  is-invalid  @enderror form-control form--control fs-14" 
                                                          type="text" 
                                                          name="description" 
                                                          placeholder="Enter Script description"
                                                          value="{{$post->description ?? old('description')}}">
                                                          @error('description')
                                                          <div class="alert alert-danger">{{ $message }}</div>
                                                          @enderror
                                                  </div><!-- end form-group -->
                                                  <div class="form-group">
                                                          <label class="fs-14 text-black fw-medium lh-20">Script</label>
                                                          <!-- <textarea name="script" class="form-control form--control user-text-editor" rows="6"></textarea> -->
                                                          <textarea 
                                                          class="@error('script')  is-invalid  @enderror form-control form--control user-text-editor"
                                                          name="script"
                                                          value="{{$post->script ?? old('script')}}" rows="6">{{$post->script}}</textarea>
                                                          @error('script')
                                                          <div class="alert alert-danger">{{ $message }}</div>
                                                          @enderror
                                                  </div><!-- end form-group -->
                                                  <div class="form-group">
                                                 </div>
                                                 <div class="form-group mb-0">
                                                  <button class="btn theme-btn" type="submit">Save Script</button>
                                          </div><!-- end form-group -->
                                  </div><!-- end card-body -->
                          </div>
                  </div><!-- end col-lg-8 -->
          </form>
  </div><!-- end container -->
</div><!-- end user-panel-main-bar -->
<!-- </div>end tab-pane -->
 @include('layout/footer')
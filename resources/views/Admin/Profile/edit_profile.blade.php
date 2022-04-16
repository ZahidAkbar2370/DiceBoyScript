@extends('Admin.layout')
@section('content')
<!-- ================================
         START USER DETAILS AREA
         ================================= -->
         <section class="user-details-area pt-40px pb-40px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="tab-content mb-50px" id="myTabContent">
                            <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                                <div class="user-panel-main-bar">
                                    <div class="user-panel">
                                        <div class="bg-gray p-3 rounded-rounded">
                                            <h3 class="fs-17">Edit your profile</h3>
                                        </div>
                                        @if (Session::has('message'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ Session::get('message') }}</strong>
                                        </div>
                                        @endif
                                        <form action="{{URL::to('admin/profile')}}" method="post" class="pt-35px" enctype="multipart/form-data">
                                            @csrf
                                            <div class="settings-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Public information</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-4 align-items-center">
                                                    <div class="col-lg-6">
                                                        <div class="edit-profile-photo d-flex flex-wrap align-items-center">
                                                            <img src="{{asset('storage/app/'.Auth::user()->profile_photo_path)}}" alt="user avatar" class="profile-img mr-4">
                                                            <div>
                                                                <div class="file-upload-wrap file--upload-wrap">
                                                                    <!-- <input type="file" name="profile" class="multi file-upload-input"> -->
                                                                    <input 
                                                                    class="@error('image')  is-invalid  @enderror multi file-upload-input" 
                                                                    type="file" 
                                                                    name="image">
                                                                    @error('image')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload Photo</span>
                                                                </div>
                                                                <p class="fs-14">Maximum file size: 10 MB.</p>
                                                            </div>
                                                        </div><!-- end edit-profile-photo -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label class="fs-13 text-black lh-20 fw-medium">Your name</label>
                                                            <div class="form-group">
                                                             <input 
                                                             class="@error('username')  is-invalid  @enderror form-control form--control" 
                                                             type="text" 
                                                             name="username" 
                                                             placeholder="Your name"
                                                             value="{{ Auth::user()->name;}}">
                                                             @error('username')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                        <div class="submit-btn-box pt-3">
                                                            <button class="btn theme-btn" type="submit">Save changes</button>
                                                        </div>
                                                    </div>
                                              <!--   <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Location</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control" type="text" name="text" value="United States">
                                                    </div>
                                                </div> -->
                                            </div><!-- end col-lg-6 -->
                                        <!--     <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="fs-15 text-black lh-20 fw-medium">About me</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control form--control user-text-editor" rows="10" cols="40"></textarea>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- end col-lg-12 -->

                                        </div><!-- end row -->
                                    </div><!-- end settings-item -->
                                </form>
                            </div><!-- end user-panel -->
                        </div><!-- end user-panel-main-bar -->
                    </div><!-- end tab-pane -->
                </div>
            </div><!-- end col-lg-9 -->
            <!-- <div class="col-lg-3">
                <div class="sidebar">
                    <div class="card card-item p-4">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Number Achievement</h3>
                            <div class="divider"><span></span></div>
                            <div class="row no-gutters text-center">
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color">980k</span>
                                        <p class="fs-14">Questions</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-2">610k</span>
                                        <p class="fs-14">Answers</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-3">650k</span>
                                        <p class="fs-14">Answer accepted</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-4">320k</span>
                                        <p class="fs-14">Users</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-3">
                                    <p class="fs-14">To get answer of question <a href="signup.html" class="text-color hover-underline">Join<i class="la la-arrow-right ml-1"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-details-area -->
<!-- ================================
         END USER DETAILS AREA
         ================================= -->

         @endsection
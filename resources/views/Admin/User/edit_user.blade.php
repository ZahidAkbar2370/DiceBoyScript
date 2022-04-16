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
                                            <h3 class="fs-17">Edit User profile</h3>
                                        </div>
                                        @if (Session::has('message'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ Session::get('message') }}</strong>
                                        </div>
                                        @endif
                                        <form action="{{URL::to('admin/update-user')}}" method="post" class="pt-35px" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="settings-item mb-10px">
                                                <h4 class="fs-14 pb-2 text-gray text-uppercase">Public User information</h4>
                                                <div class="divider"><span></span></div>
                                                <div class="row pt-4 align-items-center">
                                                    <div class="col-lg-12">
                                                        <div class="edit-profile-photo d-flex flex-wrap align-items-center">
                                                            <img src="{{asset('storage/app/'.$user->profile_photo_path)}}" alt="user avatar" class="profile-img mr-4">
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
                                                        </div>
                                                    </div><!-- end edit-profile-photo -->
                                                        <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label class="fs-13 text-black lh-20 fw-medium">Email Address</label>
                                                            <div class="form-group">
                                                             <input 
                                                             class="@error('email')  is-invalid  @enderror form-control form--control" 
                                                             type="text" 
                                                             name="email" 
                                                             placeholder="Your name"
                                                             value="{{$user->email}}">
                                                             @error('email')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror
                                                         </div>
                                                     </div>
                                                 </div>

                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label class="fs-13 text-black lh-20 fw-medium">Your name</label>
                                                            <div class="form-group">
                                                             <input 
                                                             class="@error('username')  is-invalid  @enderror form-control form--control" 
                                                             type="text" 
                                                             name="username" 
                                                             placeholder="Your name"
                                                             value="{{$user->name}}">
                                                             @error('username')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror
                                                         </div>
                                                     </div>
                                                </div>
                                                    <div class="col-lg-6">

                                                     <div class="input-box">
                                                            <label class="fs-13 text-black lh-20 fw-medium">Status</label>
                                                            <div class="form-group">
                                                             <select class="@error('status')  is-invalid  @enderror form-control form--control" 
                                                             type="text" 
                                                             name="status">
                                                                <option value="">Select Status</option>
                                                                <option value="approved" @if($user->status == "approved") selected @endif>Approved</option>
                                                                <option value="pending" @if($user->status == "pending") selected @endif>Pending</option>
                                                             </select>
                                                             @error('username')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror
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
                                        <div class="row pt-4 align-items-center">
                                            <div class="col-lg-12">
                                                <div class="submit-btn-box pt-3">
                                                    <button class="btn theme-btn" type="submit">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                </form>
                            </div><!-- end user-panel -->
                        </div><!-- end user-panel-main-bar -->
                    </div><!-- end tab-pane -->
                </div>
            </div><!-- end col-lg-9 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-details-area -->
<!-- ================================
         END USER DETAILS AREA
         ================================= -->

         @endsection
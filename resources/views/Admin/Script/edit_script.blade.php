@extends('Admin.layout')
@section('content')
<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="filters pb-40px d-flex flex-wrap align-items-center justify-content-between">
            <h3 class="fs-22 fw-medium mr-0">Edit Script</h3>
        </div><!-- end filters -->
        <form action="{{URL::to('admin/update-script')}}" class="row" method="post">
            @csrf
            <div class="col-lg-12">
                <div class="card card-item">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Title</label>
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <input type="text" name="title" value="{{$post->title}}" class="form-control form--control fs-14" placeholder="Your Post Title">
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
                        
                        <!-- <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Description</label>
                            <textarea name="description" class="form-control form--control" rows="4" placeholder="Write Description">{{$post->description}}</textarea>
                        </div> -->
                        <!-- end form-group -->

                        <div class="form-group">
                                                          <label class="fs-14 text-black fw-medium lh-20">Script</label>
                                                          <!-- <textarea name="script" class="form-control form--control user-text-editor" rows="6"></textarea> -->
                                                          <textarea 
                                                          class="@error('script')  is-invalid  @enderror form-control form--control user-text-editor"
                                                          name="script"     rows="6">{!!$post->script!!}</textarea>
                                                          @error('script')
                                                          <div class="alert alert-danger">{{ $message }}</div>
                                                          @enderror
                                                  </div><!-- end form-group -->

                        <!-- <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Script</label>
                            <textarea name="script" class="form-control form--control" rows="4"placeholder="Write Script">{{$post->script}}</textarea>
                        </div> -->
                        <!-- end form-group -->

                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Result</label>
                            <textarea name="result" class="form-control form--control" rows="4"      placeholder="Write Result">{{$post->result}}</textarea>
                        </div><!-- end form-group -->
                        
                        <div class="form-group mb-0">
                            <button class="btn theme-btn" type="submit">Update Script</button>
                        </div><!-- end form-group -->
                    </div><!-- end card-body -->
                </div>
            </div><!-- end col-lg-8 -->
        </form>
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->

         @endsection
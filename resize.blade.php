@extends('layouts.app')
@section('content')
<div class="panel panel-primary">
 <div class="panel-heading">Laravel Intervention upload image after resize</div>
  <div class="panel-body"> 
 <form method="POST" id="form" action="{{ route('intervention_postresizeimage') }}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="row">
            <div class="col-md-6">
                <br/><label>Name</label>
                <input type="text" name="name" class="form-control">
              <input type="file" name="image" class="form-control" id="upload" accept="image/*/*" >
            
                <br/>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </div>
        </div>
    </form>
 </div>
</div>
<!-- global varaible in laravel
{{$siteTitle}}

{{ config('globalvar.home') }}
--!>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
            <div class="adminForms">
                <h2 class="title">{{ __('Add Logo') }}</h2>

                <form method="POST" id="form" action="{{ route('logo_submit') }}" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group row ">
                        <label for="logo" class="col-md-12 col-form-label">{{ __('Upload Logo') }}</label>
                        <div class="col-md-12 ">
                            @if(empty($fetchlogo->logo_image)|| $fetchlogo->logo_image == '0')
                            <input type="file" name="logo" class="form-control" id="upload" accept="image/*" required="true">
                            @else
                            <img src="{{asset($fetchlogo->logo_image)}}" class="form-control" height="100" width="100" alt="logo"><br>
                            @php
                            $file_type='logo_imagedelete';
                            $dbfieldname='logo_image';
                            $current_url=url()->current();
                            $url_exp=explode('/',$current_url);
                            $id=end($url_exp);
                            @endphp
                            <a href="{{route('logo.remove',[$file_type,$id,$dbfieldname])}}"> Remove </a>
                            @endif
                        </div>
                    </div> 
                    <br> 
                    <div class="form-group row ">
                        <div class="col-md-12">
                            @if (isset($fetchlogo->id))
                            <button type="submit" class="btn btn-primary" value="{{ $fetchlogo->id }}" name="update">
                                {{ __('Update') }}
                            </button>
                            @else
                            <button type="submit" class="btn btn-primary"  name="update">
                                {{ __('Add') }}
                            </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    @endsection



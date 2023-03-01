@extends('layouts.admin')
@section('title','Cài đặt')
@section('content')

<div class="row mt-4">
    <div class="col-12">
        <div class="card">

            <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="projectname" class="form-label">Name</label>
                            <input name="title" type="text" value="{{ old('title') ?? $setting->title}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="projectname" class="form-label">hoho</label>
                            <input name="" type="text" value="" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Text</label>
                            <input name="textColor" type="color" value="{{ old('textColor') ?? $setting->textColor}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Button</label>
                            <input name="buttonColor" type="color" value="{{ old('buttonColor') ?? $setting->buttonColor}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Background</label>
                            <input name="backgroundColor" type="color" value="{{ old('backgroundColor') ?? $setting->backgroundColor}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Email 1</label>
                            <input name="email1" type="text" value="{{ old('email1') ?? $setting->email1}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Email 2</label>
                            <input name="email2" type="text" value="{{ old('email2') ?? $setting->email2}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Email 3</label>
                            <input name="email3" type="text" value="{{ old('email3') ?? $setting->email3}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Phone 1</label>
                            <input name="phone1" type="text" value="{{ old('phone1') ?? $setting->phone1}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Phone 2</label>
                            <input name="phone2" type="text" value="{{ old('phone2') ?? $setting->phone2}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Phone 3</label>
                            <input name="phone3" type="text" value="{{ old('phone3') ?? $setting->phone3}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Địa chỉ 1</label>
                            <input name="address1" type="text" value="{{ old('address1') ?? $setting->address1}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Địa chỉ 2</label>
                            <input name="address2" type="text" value="{{ old('address2') ?? $setting->address2}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Địa chỉ 3</label>
                            <input name="address3" type="text" value="{{ old('address3') ?? $setting->address3}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Facebook</label>
                            <input name="facebook" type="text" value="{{ old('facebook') ?? $setting->facebook}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Youtube</label>
                            <input name="youtube" type="text" value="{{ old('youtube') ?? $setting->youtube}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="projectname" class="form-label">Instagram</label>
                            <input name="instagram" type="text" value="{{ old('instagram') ?? $setting->instagram}}" id="projectname" class="form-control" placeholder="Enter project name">
                        </div>
                    </div>

                </div>
                <button class="btn btn-success" type="submit">cập nhập</button>

            </form>

        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

@endsection

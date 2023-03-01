@extends('layouts.admin')
@section('title','Nhân viên')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        @can('create-user')

                        <a href="{{route('users.create')}}" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm Mới</a>

                        @endcan
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row">



                    @foreach($users as $key=> $item)
                    <div class="col-lg-6 col-xxl-3" style="">
                        <div class="card d-block">
                            <div class="card-body">
                                <div class=" float-star ">


                                    @foreach($item->roles as $v)

                                    @if( $v->name == 'Admin' || $v->name == 'super-admin')
                                    <div class="badge1 bg-danger ">{{ $v->display_name }}</div>

                                    @else
                                    <div class="badge1  " style="color:black">{{ $v->display_name }}</div>

                                    @endif
                                    @endforeach
                                </div>

                                <div class="mt-3 text-center">
                                    <img src="https://scontent.fsgn5-10.fna.fbcdn.net/v/t1.6435-1/182976968_1109302452887438_6826702291110817862_n.jpg?stp=dst-jpg_s320x320&_nc_cat=107&ccb=1-7&_nc_sid=7206a8&_nc_ohc=Obn0SREJGUoAX_0AJ0G&_nc_ht=scontent.fsgn5-10.fna&oh=00_AfBsuHPY1YLn-NOcFlDoM_q5o1mamiCeAsGvq-u5NT1d_Q&oe=640FE6F1" alt="shreyu" class="img-thumbnail avatar-lg rounded-circle">
                                    <h4>{{$item->name}}</h4>
                                    <div style="display: flex;align-items: center;justify-content: center;gap: 10px;">

                                        @can('edit-user')
                                        <button class="btn btn-success btn-sm "></i> <a href="{{route('users.edit',$item->id)}}" class=" arrow-none card-drop">
                                                <i class="mdi mdi-pencil" style=" font-size: 14px;   "></i>
                                            </a>
                                        </button>
                                        @endcan
                                        @can('delete-user')





                                        @foreach($item->roles as $v)

                                        @if( $v->id !== 1 )
                                        <a style="padding: 4px 12.5px;" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$item->id}} " class="action-icon btn btn-danger"><i style="    ;" class="mdi mdi-delete"></i></a>

                                        @else

                                        @endif
                                        @endforeach
                                        @endcan

                                        <div id="danger-header-modal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-colored-header bg-danger">
                                                        <h4 class="modal-title" id="danger-header-modalLabel">Xóa {{$item->name}}</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn có chắc xóa?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>


                                                        <form action="{{route('users.destroy',$item->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" class="btn btn-danger">Xác Nhận</button>
                                                        </form>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                    @endforeach
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    @endsection

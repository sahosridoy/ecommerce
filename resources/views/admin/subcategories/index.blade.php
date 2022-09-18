@extends('layouts.admin')
@section('subcategory', 'active')
@section('page_title', 'Subcategory')

@section('content')




    <div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Category Page</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Subcategory</li>
                </ol>
            </nav>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary">
                 Create
            </a>
        </div>
    </div>

@if(session()->has('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="ti-check mr-2"></i> {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="ti-help mr-2"></i> {{ session()->get('warning') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="ti-close mr-2"></i> {{ session()->get('error') }}
    </div>
@endif







    <div class="card">
        <div class="card-body">
            <div class="table-responsive" tabindex="5" style="overflow: hidden; outline: none;">
                <div id="orders_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="orders" class="table dataTable no-footer" role="grid" aria-describedby="orders_info">
                                <thead>
                                    <tr role="row">
                                        <th class="dt-body-center sorting_disabled">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="orders-select-all">
                                                <label class="custom-control-label" for="orders-select-all"></label>
                                            </div>
                                        </th>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th style="width: 40%">Description</th>
                                        <th>Status</th>

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $item)
                                        <tr>
                                            <td class=" dt-body-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5"></label>
                                                </div>
                                            </td>

                                            <td class="sorting_1">{{ $datas->firstItem() + $key }}</td>

                                            <td>
                                                @if ($item->preview_img == '')
                                                    <img width="40" src="{{ asset('default/subcategories/default.png') }}" class="rounded mr-3" alt="Flowerpot">
                                                @else
                                                    <img width="40" src="{{ asset('uploads/subcategories/image') }}/{{ $item->preview_img }}" class="rounded mr-3" alt="Flowerpot">
                                                @endif
                                            </td>

                                            <td> {{ $item->title }}</td>
                                            <td> {{ $item->categories->title }}</td>
                                            <td style="width: 40%"> {{ $item->description == '' ? 'N/A' : $item->description }}</td>

                                            <td>
                                                @if ($item->is_active == 1)
                                                    <span class="badge bg-success-bright text-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger-bright text-danger">In Active</span>
                                                @endif
                                            </td>


                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="{{ route('admin.subcategories.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                        {{-- <a href="{{ url('category/soft_delete') }}/{{ $item->id }}" class="dropdown-item text-warning">Delete</a>
                                                        <a href="{{ url('category/p_delete') }}/{{ $item->id }}" class="dropdown-item text-danger">Permanent Delete</a>
                                                        @if ($item->action == 1)
                                                        <a href="{{ url('category/action') }}/{{ $item->id }}" class="dropdown-item text-primary">Dactive</a>
                                                        @else

                                                        <a href="{{ url('category/action') }}/{{ $item->id }}" class="dropdown-item text-success">Active</a>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td>no data</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('exta_js')
<script>
    $(document).ready(function (){
    $('#myTable').DataTable();
});
</script>
@endsection

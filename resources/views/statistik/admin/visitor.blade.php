@extends('template/admin/main')

@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Visitor</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Statistik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Visitor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- row -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <div class="card-title border-bottom">
                        <div class="row">
                            <div class="col-12 col-sm py-1 mb-2 mb-sm-0 text-center text-sm-left">
                                <h5 class="mb-0">Visitor</h5>
                            </div>
                            <div class="col-12 col-sm-auto text-center text-sm-left">
                                <select id="filter" class="form-control">
                                    <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Semua</option>
                                    <option value="admin" {{ $filter == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="member" {{ $filter == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>User</th>
                                        <th width="100">IP Address</th>
                                        <th width="150">Waktu</th>
                                        <th width="100">Lihat Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($visitor as $data)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="/admin/user/detail/{{ $data->id_user }}">{{ $data->nama_user }}</a><br><small>{{ $data->email }}</small></td>
                                        <td>{{ $data->ip_address }}</td>
                                        <td>{{ date('Y-m-d H:i:s', strtotime($data->visit_at)) }}</td>
                                        <td><a href="/admin/statistik/aktivitas/{{ $data->id_user }}">Lihat Aktivitas</a></td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    @include('template/admin/_footer')
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

@endsection

@section('js-extra')

<script src="{{ asset('templates/matrix-admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
    // DataTable
    $('#table').DataTable();
    
    // Filter
    $(document).on("change", "#filter", function(){
        var value = $(this).val();
        if(value == 'all') window.location.href = '/admin/statistik/visitor';
        else if(value == 'admin') window.location.href = '/admin/statistik/visitor?filter=admin';
        else if(value == 'member') window.location.href = '/admin/statistik/visitor?filter=member';
    });
</script>

@endsection

@section('css-extra')

<link href="{{ asset('templates/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

@endsection
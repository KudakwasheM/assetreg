<div class="container">
    <div class="container">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    Vakai system Developed by <a href="{{ url('http://indeliblemark.co.zw') }}" class="m-0">Indelible
                        Mark IT solutions</a>
                    <h1>assets</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Assets Dashbord</a></li>
                        <li class="breadcrumb-item active">Assets</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card">
                <div class="card-header text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="/assets/create" class="btn btn-default mb-3"><i
                                class="fas fa-plus"></i>Add Asset</a>

                        <div class="pull-right">
                            <a href="" class="btn btn-light btn-sm float-right"
                                data-toggle="tooltip" data-placement="left"
                                title="{{ trans('usersmanagement.tooltips.back-users') }}">
                                <i class="fa fa-fw fa-money" aria-hidden="true"></i>
                                Assets
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Asset Tag</th>
                            <th>Serial Number</th>
                            <th>Age</th>
                            <th>Purchase Date</th>
                            <th>Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                            <tr>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->make }}</td>
                                <td>{{ $asset->model }}</td>
                                <td>{{ $asset->type }}</td>
                                <td>{{ $asset->assettag }}</td>
                                <td>{{ $asset->serial }}</td>
                                <td>{{ $asset->age }}</td>
                                <td>{{ $asset->purchase_date }}</td>
                                <td>{{ $asset->assigned ? 'Assigned' : 'Not Assigned' }}</td>
                                <td>
                                    <a href="{{ route('assets.show', $asset->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('assets.edit', $asset->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this asset?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

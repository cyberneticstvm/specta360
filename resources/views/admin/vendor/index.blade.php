@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Vendor Register</h2>
            <p>Hello {{ Auth::user()->name }}, You can manage your vendor here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4 table-responsive">
                <table id="dataTable" class="table table-responsive table-sm table-striped">
                    <thead><tr><th width="5%">SL No</th><th width="15%">Vendor Name</th><th width="10%">Vendor Email</th><th width="10%">Vendor contact</th><th width="25%">Address</th><th width="10%">Status</th><th>Registered On</th><th width="10%" class="text-center">Edit</th><th width="10%" class="text-center">Cancel</th></tr></thead><tbody>
                    @forelse(getAllVendors() as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{!! $item->getStatus() !!}</td>
                            <td>{{ $item->created_at->format('d/M/Y') }}</td>
                            <td class="text-center"><a href="{{ route('admin.vendor.edit', encrypt($item->id)) }}" class="btn btn-outline-warning btn-sm">Edit</a></td>
                            <td class="text-center"><a href="{{ route('admin.vendor.cancel', encrypt($item->id)) }}" class="btn btn-outline-danger btn-sm dlt">Cancel</a></td>
                        </tr>
                    @empty
                    @endforelse
                </tbody></table>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection
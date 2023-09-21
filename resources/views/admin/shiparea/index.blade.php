@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Shipping Area Register</h2>
            <p>Hello {{ Auth::user()->name }}, You can manage your Shipping Area here!</p>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.shiparea.create') }}" class="btn btn-submit btn-md btn-brand rounded w-100 font-sm mt-15">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4 table-responsive">
                <table id="dataTable" class="table table-responsive table-sm table-striped">
                    <thead><tr><th width="10%">SL No</th><th width="20%">Place Name</th><th width="10%">Pincode</th><th width="15%">City</th><th width="15%">State</th><th width="10%">Status</th><th width="10%" class="text-center">Edit</th><th width="10%" class="text-center">Cancel</th></tr></thead><tbody>
                    @forelse($areas as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->pincode }}</td>
                            <td>{{ $item->city->name }}</td>
                            <td>{{ $item->state->name }}</td>
                            <td>{!! $item->status() !!}</td>
                            @if($item->deleted_at)
                                <td>
                                    <a href="{{ route('admin.shiparea.undone', encrypt($item->id)) }}" class="btn btn-outline-secondary btn-sm">Activate</a>
                                </td>
                                <td></td>
                            @else
                                <td class="text-center"><a href="{{ route('admin.shiparea.edit', encrypt($item->id)) }}" class="btn btn-outline-warning btn-sm">Edit</a></td>
                                <td class="text-center"><a href="{{ route('admin.shiparea.cancel', encrypt($item->id)) }}" class="btn btn-outline-danger btn-sm dlt">Cancel</a></td>
                            @endif
                        </tr>
                    @empty
                    @endforelse
                </tbody></table>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection
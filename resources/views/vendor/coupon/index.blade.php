@extends("vendor.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Coupon Register</h2>
            <p>Hello {{ Auth::user()->name }}, You can manage your coupons here!</p>
        </div>
        <div class="col-2">
            <a href="{{ route('vendor.coupon.create') }}" class="btn btn-submit btn-md btn-brand rounded w-100 font-sm mt-15">Add</a>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="card card-body mb-4 table-responsive">
                <table id="dataTable" class="table table-responsive table-sm table-striped">
                    <thead><tr><th width="5%">SL No</th><th width="20%">Coupon Name</th><th width="10%">Vendor</th><th width="15%">Start</th><th width="15%">End</th><th width="10%">Discount %</th><th width="15%">Status</th><th width="5%">Edit</th><th width="5%" class="text-center">Cancel</th></tr></thead><tbody>
                    @forelse($coupons as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->couponNameToUpper($item->name) }}</td>                            
                            <td>{{ ($item->vendor_id > 0) ? $item->vendor->name : "All Vendors" }}</td>                            
                            <td>{{ $item->start->format('d/M/Y') }}</td>                            
                            <td>{{ $item->end->format('d/M/Y') }}</td>
                            <td>{{ $item->discount_percentage }}%</td>
                            <td>{!! ($item->expired()) ? $item->expired() : $item->getStatus() !!}</td>                            
                            <td class="text-center"><a href="{{ route('vendor.coupon.edit', encrypt($item->id)) }}" class="btn btn-outline-warning btn-sm">Edit</a></td>
                            <td class="text-center"><a href="{{ route('vendor.coupon.cancel', encrypt($item->id)) }}" class="btn btn-outline-danger btn-sm dlt">Delete</a></td>
                        </tr>
                    @empty
                    @endforelse
                </tbody></table>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection
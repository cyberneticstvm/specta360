@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Banner Register</h2>
            <p>Hello {{ Auth::user()->name }}, You can manage your banner here!</p>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.banner.create') }}" class="btn btn-submit btn-md btn-brand rounded w-100 font-sm mt-15">Add</a>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="card card-body mb-4 table-responsive">
                <table id="dataTable" class="table table-responsive table-sm table-striped">
                    <thead><tr><th width="5%">SL No</th><th width="50%">Title</th><th width="10%">Label</th><th width="10%">Banner Image</th><th width="5%">Order</th><th width="10%">Status</th><th width="5%">Edit</th><th width="5%" class="text-center">Cancel</th></tr></thead><tbody>
                    @forelse($banners as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->title }}</td>                            
                            <td>{{ $item->label }}</td>                            
                            <td><img src="{{ $item->image }}" width="25%"></td>
                            <td>{{ $item->order }}</td>
                            <td>{!! $item->getStatus() !!}</td>                            
                            <td class="text-center"><a href="{{ route('admin.banner.edit', encrypt($item->id)) }}" class="btn btn-outline-warning btn-sm">Edit</a></td>
                            <td class="text-center"><a href="{{ route('admin.banner.cancel', encrypt($item->id)) }}" class="btn btn-outline-danger btn-sm dlt">Cancel</a></td>
                        </tr>
                    @empty
                    @endforelse
                </tbody></table>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection
@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Subcategory Register</h2>
            <p>Hello {{ Auth::user()->name }}, You can manage your subcategory here!</p>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.subcategory.create') }}" class="btn btn-submit btn-md btn-brand rounded w-100 font-sm mt-15">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4 table-responsive">
                <table id="dataTable" class="table table-responsive table-sm table-striped">
                    <thead><tr><th width="5%">SL No</th><th width="25%">Sucategory Name</th><th width="30%">Category Name</th><th width="10%">Subcategory Image</th><th>Status</th><th width="10%" class="text-center">Edit</th><th width="10%" class="text-center">Cancel</th></tr></thead><tbody>
                    @forelse($subcategories as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td><img src="{{ $item->image }}" width="25%"></td>
                            <td>{!! $item->getStatus() !!}</td>
                            <td class="text-center"><a href="{{ route('admin.subcategory.edit', encrypt($item->id)) }}" class="btn btn-outline-warning btn-sm">Edit</a></td>
                            <td class="text-center"><a href="{{ route('admin.subcategory.cancel', encrypt($item->id)) }}" class="btn btn-outline-danger btn-sm dlt">Cancel</a></td>
                        </tr>
                    @empty
                    @endforelse
                </tbody></table>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection
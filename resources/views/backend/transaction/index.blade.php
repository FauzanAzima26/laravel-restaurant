@extends('backend.template.main')

@section('index')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaction</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Transaction</h1>
            <p class="mb-0">Daftar Transaction Yummy Restoran</p>
        </div>
        <div>
            <a href="" class="btn btn-success d-inline-flex align-items-center text-white">
                <i class="fas fa-file-excel me-1"></i> Download
            </a>
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start text-center">No</th>
                        <th class="border-0 text-center">Name</th>
                        <th class="border-0 text-center">Type</th>
                        <th class="border-0 text-center">Amount</th>
                        <th class="border-0 text-center">Status</th>
                        <th class="border-0 text-center">Image</th>
                        <th class="border-0 text-center" width="12%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item -->
                    @forelse ($transactions as $item)

                        <tr>
                            <td>{{($transactions->currentPage() - 1) * $transactions->perPage() + $loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->type}}</td>
                            <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="badge bg-danger">Pending</span>
                                @elseif ($item->status == 'failed')
                                    <span class="badge bg-danger">Failed</span>
                                @else
                                    <span class="badge bg-success">Success</span>
                                @endif
                            </td>
                            <td class="text-center" width="20%">
                                <img src="{{ asset('storage/' . $item->file . '') }}" target="_blank">
                            </td>
                            <td class="text-center">
                                <a href="{{route('transaction.show', $item->uuid)}}" class="btn btn-sm btn-primary"
                                    title="View"><i class="bi bi-eye"></i></a>
                                <button class="btn btn-sm btn-danger" title="Delete" onclick="deleteMenu(this)"
                                    data-uuid="{{$item->uuid}}"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No menu found</td>
                        </tr>
                    @endforelse
                    <!-- End of Item -->
                </tbody>
            </table>
            <div class="mt-3">
                {{$transactions->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const deleteMenu = (e) => {
        let uuid = e.getAttribute('data-uuid')

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: `/menu/${uuid}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "data.message",
                            icon: "success",
                            timer: 3500,
                            timerConfirmButton: false,
                        });

                        window.location.reload();
                    },
                    error: function (data) {
                        Swal.fire({
                            title: "Failed!",
                            text: "Your file has not deleted.",
                            icon: "error"
                        });

                        console.log(data)
                    }
                });
            }
        });
    }
</script>
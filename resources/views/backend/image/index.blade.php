@extends('backend.template.main')

@section('index')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery image</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Bootstrap tables</h1>
            <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
        </div>
        <div>
            <a href="{{route('image.create')}}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg>
                Add image
            </a>
        </div>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Slug</th>
                        <th class="border-0">description</th>
                        <th class="border-0">File</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item -->
                    @foreach ($images as $item)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{asset('storage/app/public/images/' . $item->file . '')}}" width="100" height="100" target="_blank">
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-primary"><i class="far fa-edit"></i>
                                    Edit
                                </a>
                                <form action="" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                    <!-- End of Item -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
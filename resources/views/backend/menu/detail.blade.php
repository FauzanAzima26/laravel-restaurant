@extends('backend.template.main')

@section('index')

<div class="card shadow-sm">

    <div class="card-header d-flex flex-row align-items-center flex-0">
        <p class="h6 mb-0">Detail Menu</p>
        <div class="d-flex ms-auto">
            <a href="{{route('menu.index')}}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-fill me-2" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8z" />
                </svg>
                Back
            </a>
        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped" style="width:100%">
                <tr>
                    <th>Photo</th>
                    <td>
                        <img src="{{ Storage::url($menu->image) }}">
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $menu->name }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $menu->categories->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td> @php
                            $description = $menu->description;
                            $charLimit = 50; // Jumlah karakter sebelum new line
                        @endphp
                        @for($i = 0; $i < strlen($description); $i += $charLimit)
                            {{ substr($description, $i, $charLimit) }}<br>
                        @endfor
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>Rp.{{number_format($menu->price, 0, ',','.')}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$menu->status}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
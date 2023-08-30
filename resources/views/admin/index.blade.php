@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses</strong> {{ session('succsess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                $(".alert").alert('close')
            </script>
        @endif

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                            data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                        data-input>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Users</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2">1</h3>
                                        {{-- <h3 class="mb-2">{{ count($user) }}</h3> --}}
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span></span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Film</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2">{{ count($posts) }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span></span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Anime</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2">2</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span></span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="GET">
                            <div class="mb-3">
                                <label for="title" class="form-label">Search Data</label>
                                <input type="text" name="cari" class="form-control" placeholder="Search Data by Title"
                                    autofocus="true" value="{{ $cari }}">
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Projects</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">@sortablelink('id', 'no')</th>
                                        <th class="pt-0">Images</th>
                                        <th class="pt-0">@sortablelink('title', 'film title')</th>
                                        <th class="pt-0">Genre</th>
                                        <th class="pt-0">Full Time</th>
                                        {{-- <th class="pt-0">Description</th> --}}
                                        <th class="pt-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $imagePath = '';
                                    @endphp
                                    @forelse ($posts as $post)
                                        @php
                                            $imagePath = public_path('posts/' . $post->image);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/posts/' . $post->image) }}">
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                @php
                                                    $genreNames = $post->genres->pluck('name')->implode(', ');
                                                @endphp
                                                {{ $genreNames }}
                                            </td>

                                            <td>{{ $post->time }} M</td>
                                            {{-- <td data-toggle="tooltip" class="text-truncate scrollable-column"
                                                style="max-width: 200px;">{{ $post->desc }}</td> --}}
                                            <td class="text-center">
                                                <form onsubmit="return confirm('apakah anda yakin?');"
                                                    action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ route('post.edit', $post->slug) }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                    <a href="{{ route('posts.show', $post->slug) }}"
                                                        class="btn btn-sm btn-primary">SHOW</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            No Data has been Added yet.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $posts->links() }} --}}
                            {!! $posts->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    function updateTotal() {
        var table = document.getElementById("filmTable");
        var rowCount = table.rows.length - 1; // Mengurangi 1 untuk mengabaikan header
        var headerCell = document.getElementById("totalCell");
        headerCell.innerHTML = "Total Data: " + rowCount;
    }

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

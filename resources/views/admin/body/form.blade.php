@php
    $data = (object) [
        'name' => '',
        'slug' => '',
        'price' => '',
        'stock' => '',
        'genre_ids' => [],
        'desc' => '',
    ];
@endphp


<body>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Inputs Data</h6>
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" id="title"
                                placeholder="Enter Title Name" value="{{ old('title') }}">

                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug"
                                class="form-control @error('slug') is-invalid @enderror" id="slug"
                                value="{{ old('slug') }}" disabled>

                            @error('slug')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label><br>
                            <div class="grid grid-cols-5 gap-2">
                                @foreach ($genres as $genre)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="genre_ids[]"
                                            value="{{ $genre->id }}"
                                            {{ in_array($genre->id, old('genre_ids', $data->genre_ids)) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $genre->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('genre_ids')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="time" class="form-label">Total Time</label>
                            <input type="number" name="time"
                                class="form-control @error('time') is-invalid @enderror" id="time"
                                placeholder="Enter time" value="{{ old('time') }}">

                            @error('time')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="5">
                                {{ old('desc') }}</textarea>

                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="formFile">Film Image</label>
                            <input class="form-control  @error('image') is-invalid @enderror" name="image"
                                type="file" id="formFile">

                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-body d-flex flex-column">
                            <button class="w-fit btn btn-primary" type="submit"
                                onclick="showSwal('custom-position')">Submit
                                Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('content');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    {{-- jQuery Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Check Slug --}}
    <script>
        $('#title').change(function(e) {
            $.get('{{ url('check_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>
    <script src="{{ asset('backend/assets/js/sweet-alert.js') }}"></script>

</body>

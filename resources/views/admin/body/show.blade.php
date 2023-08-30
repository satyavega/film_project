<div class="col-md-8 col-xl-6 border middle-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card rounded">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">

                            {{-- <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt=""> --}}
                            <div class="ms-2">
                                <p>{{ $post->title }}</p>
                                <p class="tx-11 text-muted">{{ $post->time }} M</p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="meh" class="icon-sm me-2"></i> <span
                                        class="">Unfollow</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="corner-right-up" class="icon-sm me-2"></i> <span class="">Go
                                        to post</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="share-2" class="icon-sm me-2"></i> <span
                                        class="">Share</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="copy" class="icon-sm me-2"></i> <span class="">Copy
                                        link</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-3 tx-14">{{ $post->desc }}</p>
                    <img class="img-fluid" src="{{ asset('/storage/posts/' . $post->image) }}" alt="">
                </div>
                {{-- <div class="card-footer">
                    <div class="d-flex post-actions">
                        <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                            <i class="icon-md" data-feather="heart"></i>
                            <p class="d-none d-md-block ms-2">Like</p>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                            <i class="icon-md" data-feather="message-square"></i>
                            <p class="d-none d-md-block ms-2">Comment</p>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center text-muted">
                            <i class="icon-md" data-feather="share"></i>
                            <p class="d-none d-md-block ms-2">Share</p>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

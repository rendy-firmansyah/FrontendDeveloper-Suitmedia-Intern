<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-6 my-2">
            Showing {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }} - {{ min($paginator->total(), $paginator->currentPage() * $paginator->perPage()) }} of {{ $paginator->total() }}
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-sm-12 my-2">
                    <form action="" method="GET">
                        <label for="perPage">Show per page:</label>
                        <select name="perPage" id="perPage" onchange="handlePerPageChange(this)" class="py-2 px-5 rounded-pill">
                            <option value="10" {{ $paginator->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $paginator->perPage() == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ $paginator->perPage() == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-6 col-sm-12 my-2">
                    <form action="" method="GET">
                        <label for="sort" class="">Sort by:</label>
                        <select name="sort" id="sort" onchange="this.form.submit()" class="py-2 px-5 rounded-pill">
                            <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="oldest" {{ $sort == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        @foreach($ideasData as $idea)
            <div class="col-md-3 my-3">
                <div class="card w-full h-100 shadow" style="border-radius: 20px;">
                    @if(isset($idea['medium_image'][0]['url']))
                        <img src="{{ $idea['medium_image'][0]['url'] }}" class="card-img-top img-fluid img-cover" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0 0;" alt="Small Image">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" class="card-img-top img-fluid img-cover" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0 0;" alt="Placeholder Image">
                    @endif
                    {{-- <img src="{{ $idea['medium_image'][0]['url'] }}" class="card-img-top img-fluid img-cover" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0 0;" alt="Small Image"> --}}
                    <div class="card-body">
                        <p class="card-title">{{ \Carbon\Carbon::parse($idea['published_at'])->isoFormat('D MMMM YYYY') }}</p>
                        <h5 class="card-title" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">{{ $idea['title'] }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if ($paginator->lastPage() > 1)

                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        {{-- Number Page Links --}}
                        {{-- @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                            <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor --}}
                        @php
                            $start = max($paginator->currentPage() - 7, 1);
                            $end = min($paginator->currentPage() + 7, $paginator->lastPage());
                            
                            if ($paginator->currentPage() < 8) {
                                $end += 8 - $paginator->currentPage();
                            } elseif ($paginator->lastPage() - $paginator->currentPage() < 8) {
                                $start -= 8 - ($paginator->lastPage() - $paginator->currentPage());
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&raquo;</span>
                            </li>
                        @endif
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
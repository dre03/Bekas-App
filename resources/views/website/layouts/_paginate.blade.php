<div class="row mt-sm-5 mt-4">
        <div class="col-12 d-flex justify-content-evenly paginate">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled"><span class="page-a">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-a" href="{{ $products->previousPageUrl() }}"
                                rel="prev">&laquo;</a></li>
                    @endif

                    @php
                        $start = max(1, $products->currentPage() - 2);
                        $end = min($start + 4, $products->lastPage());
                        $start = max(1, $end - 4);
                    @endphp

                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $products->currentPage())
                            <li class="page-item active"><span class="page-a active">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-a"
                                    href="{{ $products->url($page) }}">{{ $page }}</a></li>
                        @endif
                    @endfor

                    @if ($products->hasMorePages())
                        <li class="page-item"><a class="page-a" href="{{ $products->nextPageUrl() }}"
                                rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-a">&raquo;</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
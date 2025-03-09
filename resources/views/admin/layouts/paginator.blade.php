<nav class="d-flex justify-items-center justify-content-between">
    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <div class="small text-muted">
            Всего записей: <span class="fw-semibold">{{ $paginator->total() }}</span>
        </div>

        <div>
            @if ($paginator->hasPages())
                <ul class="pagination pagination-sm m-0">
                    <li class="page-item @if($paginator->onFirstPage()) disabled @endif"><a class="page-link" href="{{ $paginator->previousPageUrl() }}#">«</a></li>

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <li class="page-item @if($page == $paginator->currentPage()) active @endif">
                                    <a class="page-link @if($page == $paginator->currentPage()) disabled @endif" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                        @endif
                    @endforeach

                    <li class="page-item @if(!$paginator->hasMorePages()) disabled @endif"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">»</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>





@if($paginator->hasPages())
<nav class="flexbox mt-30">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i>Previous</span>
    @else
    <a class="btn btn-white" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ti-arrow-left fs-9 mr-4"></i>Previous</a>
    @endif


    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a class="btn btn-white" href="{{ $paginator->nextPageUrl() }}" rel="next">Next<i class="ti-arrow-right fs-9 ml-4"></i></a>
    @else
    <span class="btn btn-white disabled">Next<i class="ti-arrow-right fs-9 ml-4"></i></span>
    @endif

</nav>
@endif
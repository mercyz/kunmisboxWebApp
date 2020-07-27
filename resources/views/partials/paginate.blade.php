@if($paginator->hasPages())
    <ul class="blog-pagination ">
        @if($paginator->currentPage() > 5)
            <li class="active"><a href="<?php echo $paginator->url($paginator->currentPage() - 5); ?>" rel="prev" aria-label="&lsaquo;">&lsaquo;</a></li>
         @endif
        @if ($paginator->onFirstPage())
        <li class=" disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}"  rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-left"></i></a></li>
        @endif
     @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><a class="">{{ $page }}</a></li>
                    @else
                        <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
                <li class="">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
            @if($paginator->lastPage() >= $paginator->currentPage()+5)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url( $paginator->currentPage() + 5 ) }}" rel="prev" aria-label="Skip 5  &rsaquo;">Skip 5 &rsaquo;</a>
                </li>
            @endif
    </ul>
@endif

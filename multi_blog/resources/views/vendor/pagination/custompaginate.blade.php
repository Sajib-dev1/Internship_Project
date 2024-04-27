

@if ($paginator->hasPages()) 
    <nav>
        <ul class="pagination justify-content-center">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage()) 
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                        @else  
                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
    </nav>
@endif 
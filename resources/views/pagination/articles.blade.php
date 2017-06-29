@if ($paginator->lastPage() > 1)
    <ul class="pagination justify-content-center column">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
            <a href="{{ $paginator->url(1) }}" class="page-link pagination test-hover"><</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class=" page-item">
                <a href="{{ $paginator->url($i) }}" class="page-link pagination test-hover {{ ($paginator->currentPage() == $i) ? ' active-pagination' : '' }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}"  class="page-link">></a>
        </li>
    </ul>
@endif

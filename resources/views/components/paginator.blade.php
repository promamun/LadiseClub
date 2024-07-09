@props(['paginator'])
<nav>
  <ul class="pagination">
    @if ($paginator->onFirstPage())
      <li>
        <a href="#">
          <i class="fas fa-arrow-left"></i>
        </a>
      </li>
    @else
      <li>
        <a href="{{ $paginator->previousPageUrl() }}">
          <i class="fas fa-arrow-left"></i>
        </a>
      </li>
    @endif
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
      <li class="{{ $i == $paginator->currentPage() ? 'active' : '' }}"><a href="{{ $paginator->url($i) }}">{{ $i }}</a>
      </li>
    @endfor
    @if ($paginator->hasMorePages())
      <li>
        <a href="{{ $paginator->nextPageUrl() }}">
          <i class="fas fa-arrow-right"></i>
        </a>
      </li>
    @else
      <li>
        <a href="#">
          <i class="fas fa-arrow-right"></i>
        </a>
      </li>
    @endif
  </ul>
</nav>

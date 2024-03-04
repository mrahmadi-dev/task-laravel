<?php

namespace App\Dtos\Pagination;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class PaginationLinks extends DataTransferObject
{
    public string $first;
    public string $last;
    public ?string $prev;
    public ?string $next;


    /**
     * @throws UnknownProperties
     */
    public static function fromPaginator(LengthAwarePaginator $paginator): PaginationLinks
    {
        $urls = $paginator->getUrlRange(1, $paginator->lastPage());
        $array_key_first = array_key_first($urls);
        $currentPage = $paginator->currentPage();
        return new static([
            'first' => $urls[$array_key_first],
            'last' => end($urls),
            'prev' => $urls[$currentPage - 1] ?? null,
            'next' => $urls[$currentPage + 1] ?? null,
        ]);
    }
}

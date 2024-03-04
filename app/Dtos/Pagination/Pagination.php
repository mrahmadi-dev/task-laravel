<?php

namespace App\Dtos\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Pagination extends DataTransferObject
{
    public PaginationLinks $links;
    public array $data;
    public PaginationMeta $meta;

    /**
     * @throws UnknownProperties
     */
    public static function fromModelPaginatorAndData(LengthAwarePaginator $paginator, array $data): Pagination
    {
        return new self([
            'links' => PaginationLinks::fromPaginator($paginator),
            'data' => $data,
            'meta' => PaginationMeta::fromPaginator($paginator),
        ]);
    }
}

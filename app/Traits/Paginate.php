<?php

namespace App\Traits;

use App\Exceptions\InvalidArgumentException;

trait Paginate
{
    protected function getPageSize(): int
    {
        $pageSize = request('page_size', 10);

        if ($pageSize > 100) {
            throw new InvalidArgumentException('Page Size must be less than 100');
        }

        return $pageSize;
    }

    protected function getPage(): int
    {
        $page = request('page', 1);

        if ($page < 1) {
            throw new InvalidArgumentException('Page must be greater than 0');
        }

        return $page;
    }
}

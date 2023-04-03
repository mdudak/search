<?php

declare(strict_types=1);

namespace Konekt\Search\Contracts;

use Illuminate\Support\Collection;

interface SearchDialect
{
    public function buildQueries(Collection $modelsToSearchThrough): Collection;
}

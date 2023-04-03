<?php

declare(strict_types=1);

namespace Konekt\Search\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface SearchDialect
{
    public function buildQueries(Collection $modelsToSearchThrough): Collection;

    public function addWhereTermsToQuery(Builder $query, array|string $column): void;

    public function useSoundex(): void;

    public function avoidSoundex(): void;
}

<?php

declare(strict_types=1);

namespace Konekt\Search\Dialects;

use Illuminate\Database\Query\Expression;
use Illuminate\Support\Collection;
use Konekt\Search\Contracts\SearchDialect;
use Konekt\Search\ModelToSearchThrough;

class PostgresDialect extends BaseDialect implements SearchDialect
{
    public function buildQueries(Collection $modelsToSearchThrough): Collection
    {
        return $modelsToSearchThrough->map(function (ModelToSearchThrough $modelToSearchThrough) {
            return $modelToSearchThrough->getFreshBuilder()
                ->select(
                    array_merge([new Expression('CAST(NULL AS bigint)')], $this->searcher->makeSelects($modelToSearchThrough))
                )
                ->tap(function ($builder) use ($modelToSearchThrough) {
                    $this->searcher->addSearchQueryToBuilder($builder, $modelToSearchThrough);
                    $this->searcher->addRelevanceQueryToBuilder($builder, $modelToSearchThrough);
                });
        });
    }
}

<?php

declare(strict_types=1);

namespace Konekt\Search\Dialects;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Konekt\Search\Contracts\SearchDialect;
use Konekt\Search\ModelToSearchThrough;

class MySQLDialect extends BaseDialect implements SearchDialect
{
    protected string $whereOperator = 'like';

    public function buildQueries(Collection $modelsToSearchThrough): Collection
    {
        return $modelsToSearchThrough->map(function (ModelToSearchThrough $modelToSearchThrough) {
            return $modelToSearchThrough->getFreshBuilder()
                ->select($this->searcher->makeSelects($modelToSearchThrough))
                ->tap(function ($builder) use ($modelToSearchThrough) {
                    $this->searcher->addSearchQueryToBuilder($builder, $modelToSearchThrough);
                    $this->searcher->addRelevanceQueryToBuilder($builder, $modelToSearchThrough);
                });
        });
    }

    public function addWhereTermsToQuery(Builder $query, array|string $column): void
    {
        $column = $this->searcher->isCaseInsensitive() ? $query->getGrammar()->wrap($column) : $column;

        $this->searcher->getSearchTerms()->each(function ($term) use ($query, $column) {
            $this->searcher->isCaseInsensitive()
                ? $query->orWhereRaw("LOWER({$column}) {$this->whereOperator} ?", [$term])
                : $query->orWhere($column, $this->whereOperator, $term);
        });
    }

    public function useSoundex(): void
    {
        $this->whereOperator = 'sounds like';
    }

    public function avoidSoundex(): void
    {
        $this->whereOperator = 'like';
    }
}

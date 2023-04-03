<?php

declare(strict_types=1);

namespace Konekt\Search\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Konekt\Search\Searcher new()
 * @method static Konekt\Search\Searcher orderByAsc()
 * @method static Konekt\Search\Searcher orderByDesc()
 * @method static Konekt\Search\Searcher dontParseTerm()
 * @method static Konekt\Search\Searcher includeModelType()
 * @method static Konekt\Search\Searcher beginWithWildcard(bool $state)
 * @method static Konekt\Search\Searcher endWithWildcard(bool $state)
 * @method static Konekt\Search\Searcher soundsLike(bool $state)
 * @method static Konekt\Search\Searcher add($query, $columns, string $orderByColumn = null)
 * @method static Konekt\Search\Searcher when($value, callable $callback = null, callable $default = null)
 * @method static Konekt\Search\Searcher addMany($queries)
 * @method static Konekt\Search\Searcher paginate($perPage = 15, $pageName = 'page', $page = null)
 * @method static Konekt\Search\Searcher simplePaginate($perPage = 15, $pageName = 'page', $page = null)
 * @method static \Illuminate\Support\Collection parseTerms(string $terms, callable $callback = null)
 * @method static \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator get(string $terms = null)
 *
 */
class Search extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'konekt-search';
    }
}

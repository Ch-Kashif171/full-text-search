<?php

namespace Kashif\FullTextSearch;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{

    /**
     * @param $query
     * @param $term
     * @return Builder
     */
    public function scopeSearch($query, $term): Builder {
        return $query->whereRaw("MATCH ({$this->getColumns()}) AGAINST (? IN BOOLEAN MODE)" , $this->getWildCard($term));
    }

    /**
     * @param $term
     * @return string
     */
    private function getWildCard($term): string {
        return WildCard::wildCard($term);
    }

    /**
     * @return string
     */
    private function getColumns(): string {
        return implode(',', $this->searchable);
    }

}

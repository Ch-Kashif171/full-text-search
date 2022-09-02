<?php


namespace Kashif\FullTextSearch;


class WildCard
{
    /**
     * @param $term
     * @return string
     */
    public static function wildCard($term): string
    {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);
        $words = explode(' ', $term);
        foreach ($words as $key => $word) {
            if (strlen($word) >= 3) {
                $words[$key] = '*' . $word . '*';
            }
        }
        return implode(' ', $words);
    }

}

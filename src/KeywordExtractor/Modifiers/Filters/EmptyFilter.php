<?php

namespace KeywordExtractor\Modifiers\Filters;

class EmptyFilter extends AbstractFilter
{
    public function modifyToken($token)
    {
        if ($token === '' || ctype_space($token)) {
            return '';
        }

        return $token;
    }

    public function modifyTokens(array $array)
    {
        foreach ($array as $key => $value) {
            if ($this->modifyToken($value) === '') {
                unset($array[$key]);
            }
        }

        return $array;
    }
}

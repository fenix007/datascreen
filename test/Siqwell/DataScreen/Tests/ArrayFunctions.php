<?php

namespace Siqwell\DataScreen\Tests;

trait ArrayFunctions
{
    protected function excludeArrayFields(array $arr, array $fields) : array
    {
        $fieldsToExclude = array_combine(
            $fields,
            array_fill(0, count($fields), $fields)
        );

        return array_diff_key($arr, $fieldsToExclude);
    }

    protected function excludeArrayOrSubArrayFields(array $arr, array $fields) : array
    {
        if ($this->isAssoc($arr)) {
            return $this->excludeArrayFields($arr, $fields);
        }

        array_walk($arr, function (&$subArr) use ($fields) {
            $subArr = $this->excludeArrayFields($subArr, $fields);
        });

        return $arr;
    }

    protected function isAssoc(array $arr) : bool
    {
        if (array() === $arr){
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}

<?php

if (!function_exists('getSegment'))
{

    /**
     * Returns segment value for given segment number or false.
     *
     * @param int $number The segment number for which we want to return the value of
     *
     * @return string|false
     */
    function getSegment(int $number)
    {
        $request = \Config\Services::request();

        if ($request->uri->getTotalSegments() >= $number && $request->uri->getSegment($number))
        {
            return $request->uri->getSegment($number);
        }
        else
        {
            return false;
        }
    }

} 
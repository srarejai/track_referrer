<?php

// src/Demo.php

namespace track_referrer\Demo;

class Demo
{

    /**** Function to geocode ip address. Accepts ip as parameter and returns geocoded details as an array ****/

    public function IsRedirectedFrom($url, $urlarray)
    {

        /**** Check Number Of Arguments Passed ****/

        $numargs = func_num_args();

        if ($numargs !== 2) {
          $result = [];
          $result['statusCode'] = '100';
          $result['statusMessage'] = 'Error: Invalid Number Of Arguments Passed';
          return jscon_encode($result);
        }

        /**** Check if second parameter is valid array ****/

        if(!is_array($urlarray))
        {
            $result= [];
            $result['statusCode'] = '101';
            $result['statusMessage'] = 'Error: Second Parameter Should Be Array';
            return jscon_encode($result);
        }

        /**** Check if first parameter is a valid url ****/

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $result= [];
            $result['statusCode'] = '102';
            $result['statusMessage'] = 'Error: First Parameter Should Be Valid URL';
            return jscon_encode($result);
        }


        /**** Check if all elements of second parameter array are valid urls ****/

        foreach($urlarray as $key => $value)
        {
          if (!filter_var($value, FILTER_VALIDATE_URL)) {
            $result= [];
            $result['statusCode'] = '103';
            $result['statusMessage'] = "Error: Element ".$key. ' Of Second Parameter Is Not A Valid URL';
            return jscon_encode($result);
          }
        }

        foreach($urlarray as $key => $value)
        {
          if (strpos($url, $value) !== FALSE) {
            $result= [];
            $result['statusCode'] = '200';
            $result['statusMessage'] = 'Success: Visitor redirected from '.$value;
            return jscon_encode($result);

          }
        }

        $result= [];
        $result['statusCode'] = '201';
        $result['statusMessage'] = 'Error: Visitor not redirected from any of the mentioned urls';
        return jscon_encode($result);

        return false;
    }
}

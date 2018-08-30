<?php

// src/Demo.php

namespace track_referrer\Demo;

class Demo
{

    /**** Function to geocode ip address. Accepts ip as parameter and returns geocoded details as an array ****/

    public function IsRedirectedFrom($url, $urlarray)
    {

        /**** Check if second parameter is valid array ****/

        if(!is_array($urlarray))
          return 'Error Code 1 : Second parameter should be an array';

        /**** Check if all elements of second parameter array are valid urls ****/

        foreach($urlarray as $key => $value)
        {
          $urlvalid = preg_match('/%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu/', $value);

          if(!$urlvalid)
            return 'Error Code 2 : Invalid url submitted as part of second parameter';
        }

        foreach($urlarray as $key => $value)
        {
          if (strpos($url, $value) !== FALSE) {
            return "Request Redirected From ".$value;
          }
        }

        return false;
    }
}

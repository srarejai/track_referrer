Usage Instruction for package GeoCoding Ip addresses.

1. Include class on top using following line.

use track_referrer\Demo\Demo;

2. In composer.json include following line

"require": {
     "track_referrer/Demo": "dev-master"
}

3. Execute

composer update

4. Add following line to providers array in app.php

track_referrer\Demo\DemoServiceProvider::class

5. Add following line to aliases array

'track_referrer' => track_referrer\Demo\Demo::class

5. Use following code in your controller

$fromurl = $_SERVER['HTTP_REFERRER'];

$urlarray = array();

Include all the url's that you want to check for redirects from.

$urlarray[] = "https://www.google.co.in";
$urlarray[] = "https://www.yahoo.co.in";
$urlarray[] = "https://www.amazon.in";

$refer = new Demo();
$checkrefer = $refer->IsRedirectedFrom($fromurl, $urlarray);
if(!$checkrefer)
  echo 'Not Redirected from any of the sites';
else
  echo $checkrefer;

6. Results

statusCode: 100
statusMessage: Error: Invalid Number Of Arguments Passed

statusCode: 101
statusMessage: Error: Second Parameter Should Be Array

statusCode: 102
statusMessage: Error: First Parameter Should Be Valid URL

statusCode: 103
statusMessage: Error: Element Of Second Parameter Is Not A Valid URL

statusCode: 200
statusMessage: Success: Visitor redirected from url

statusCode: 201
statusMessage: Error: Visitor not redirected from any of the mentioned urls

<?php
echo 'xxx';
function geocode($city){
   $cityclean = str_replace (" ", "+", $city);
   $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&sensor=false";

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $geoloc = json_decode(curl_exec($ch), true);

   $step1 = $geoloc['results'];
   $step2 = $step1['geometry'];
   $coords = $step2['location'];

   print $coords['lat'];
   print $coords['lng'];

}
?>

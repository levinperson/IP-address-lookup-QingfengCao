<?php
require_once 'vendor/autoload.php'; // GeoLite2 reader library
use MaxMind\Db\Reader;

// Get IPs from POST request
$ips = json_decode($_POST["ips"]);

// Open GeoLite2 City database
$reader = new Reader('GeoLite2-City_20230331/GeoLite2-City.mmdb');

// Lookup information for each IP address
$result = "";
foreach ($ips as $ip) {
	$ip = trim($ip);
	if (!empty($ip)) {
    //Check each IP address for validity using the FILTER_VALIDATE_IP filter
    if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
			$result .= "<div class=\"ip-info\"><p><strong>IP Address:</strong> $ip<br>";
			$result .= "<strong>Error:</strong> Invalid IP address format</p></div>";
			continue;
		}
		$data = $reader->get($ip);
    //Check if the IP address is found in the database
    if ($data === null) {
			$result .= "<div class=\"ip-info\"><p><strong>IP Address:</strong> $ip<br>";
			$result .= "<strong>Error:</strong> IP address not found in database</p></div>";
			continue;
		}
		$result .= "<div class=\"ip-info\"><p><strong>IP Address:</strong> $ip<br>";
		$result .= "<strong>Country Code:</strong> " . $data['country']['iso_code'] . "<br>";
		$result .= "<strong>Postal Code:</strong> " . $data['postal']['code'] . "<br>";
		$result .= "<strong>City Name:</strong> " . $data['city']['names']['en'] . "<br>";
		$result .= "<strong>Time Zone:</strong> " . $data['location']['time_zone'] . "<br>";
		$result .= "<strong>Accuracy Radius:</strong> " . $data['location']['accuracy_radius'] . " km </p></div>";
	}
}

// Return result
echo $result;
?>
<?php
require_once 'vendor/autoload.php';
use MaxMind\Db\Reader;
use PHPUnit\Framework\TestCase;

class IpFormatTest extends TestCase {
    public function testValidIp() {
        // Sample IP address to test
        $ip = '173.183.119.222';
        
        // Create a new instance of the GeoLite2 reader
        $reader = new Reader('GeoLite2-City_20230331/GeoLite2-City.mmdb');
        
        // Get the expected data for the IP address
        $expected = [
            'country_code' => 'CA',
            'postal_code' => 'V3L',
            'city_name' => 'New Westminster',
            'time_zone' => 'America/Vancouver',
            'accuracy_radius' => 5
        ];
        
        // Look up information for the IP address
        $data = $reader->get($ip);
        
        // Check that the returned data matches the expected data
        $this->assertEquals($expected['country_code'], $data['country']['iso_code']);
        $this->assertEquals($expected['postal_code'], $data['postal']['code']);
        $this->assertEquals($expected['city_name'], $data['city']['names']['en']);
        $this->assertEquals($expected['time_zone'], $data['location']['time_zone']);
        $this->assertEquals($expected['accuracy_radius'], $data['location']['accuracy_radius']);
    }

    public function testInvalidIp() {
        
        // Sample invalid IP address to test
        $ip = '1.2.3';
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value "' . $ip . '" is not a valid IP address.');
        
        // Create a new instance of the GeoLite2 reader
        $reader = new Reader('GeoLite2-City_20230331/GeoLite2-City.mmdb');
        
        // Look up information for the IP address
        $data = $reader->get($ip);       
    }  
}
?>

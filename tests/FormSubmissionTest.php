<?php
use PHPUnit\Framework\TestCase;

class FormSubmissionTest extends TestCase {
    public function testLookup()
    {
        // Prepare the data to submit
        $ips = "8.8.8.8\n1.1.1.1";
        $data = [
            'ips' => json_encode(explode("\n", $ips)),
        ];

        // Simulate the form submission
        $_POST = $data;
        ob_start();
        include 'index.php';
        $result = ob_get_clean();

        // Check the expected results
        $this->assertStringContainsString('<label for="ip-input">Enter IP addresses (one per line):</label><br>', $result);
    }
}
?>

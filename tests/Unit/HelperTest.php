<?php

namespace Tests\Unit;

use App\Helpers\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_helper_access_true(): void {
        $helper = (new \App\Helpers\Helper)->accessTrue();
        $this->assertTrue($helper);
    }
}

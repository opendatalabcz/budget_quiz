<?php

namespace Tests\Unit;

use App\Models\Party;
use PHPUnit\Framework\TestCase;

/**
 * Test the Party model
 */
class PartyTest extends TestCase
{
    /**
     * Tests whether Party model formats display name without short name correctly.
     *
     * @return void
     */
    public function test_display_name_without_short_name()
    {
        $party = new Party();
        $party->name = 'Test';
        $party->short_name = '';

        $this->assertTrue($party->displayName() === 'Test');
    }

    /**
     * Tests whether Party model formats display name with short name correctly
     *
     * @return void
     */
    public function test_display_name_with_short_name()
    {
        $party = new Party();
        $party->name = 'Test';
        $party->short_name = 'TST';

        $this->assertTrue($party->displayName() === '(TST) – Test');
    }
}

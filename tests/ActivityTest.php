<?php declare(strict_types=1);

use App\Activity;
use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    public function testA()
    {
        $data = [
            'metadata' => [
                'external_id' => '001',
                'athlete_id' => '30383458',
                'start_date' => (new DateTimeImmutable())->format(DateTimeImmutable::RFC3339),
            ]
        ];
        $activity = Activity::createFromData($data);

        $this->assertNotEmpty($activity->getId());
    }
}

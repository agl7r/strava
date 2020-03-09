<?php declare(strict_types=1);

namespace App;

use DateTimeImmutable;

class Activity
{
    /**
     * @var array $data
     */
    private $data;

    private function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->getStartDate()->format('YmdHi');
    }

    /**
     * @return DateTimeImmutable
     */
    public function getStartDate(): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat(
            DateTimeImmutable::RFC3339,
            $this->data['metadata']['start_date']);
    }

    /**
     * @param array $data
     *
     * @return self|null
     */
    public static function createFromData(array $data): ?self
    {
        if (empty($data['metadata']['external_id'])) {
            return null;
        }
        if (empty($data['metadata']['athlete_id'])) {
            return null;
        }
        $myAthleteId = '30383458';
        if ($data['metadata']['athlete_id'] !== $myAthleteId) {
            return null;
        }
        return new self($data);
    }
}

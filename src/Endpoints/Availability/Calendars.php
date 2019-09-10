<?php

namespace Resova\Endpoints\Availability;

use Resova\Endpoints\Availability;

class Calendars extends Availability
{
    /**
     * Retrieve daily availability
     * Retrieve the instances for items across a date range.
     *
     * @param string $start_date The start date for the availability range
     * @param string $end_date   The end date for the availability range.
     * @param array  $item_ids   Limit the availability results by item ids
     *
     * @return $this
     */
    public function __invoke(string $start_date, string $end_date, array $item_ids = []): self
    {
        // Default parameters
        $params = [
            'start_date' => $start_date,
            'end_date'   => $end_date,
        ];

        // Optional: Limit the availability results by item ids
        if (!empty($item_ids)) {
            $params['item_ids'] = implode(',', $item_ids);
        }

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/availability/calendar' . '?' . http_build_query($params);

        return $this;
    }

}

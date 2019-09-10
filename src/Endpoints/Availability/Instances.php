<?php

namespace Resova\Endpoints\Availability;

use Resova\Endpoints\Availability;
use Resova\Models\Pricing;

class Instances extends Availability
{
    /**
     * Retrieve an instance
     * Retrieve the details of a specific instance.
     *
     * @param string $instance_id The Instance Id
     *
     * @return $this
     */
    public function __invoke(string $instance_id): self
    {
        $this->instance_id = $instance_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/availability/instance/' . $instance_id;

        return $this;
    }

    /**
     * Retrieve instance pricing
     * Retrieve the pricing for an instance for the quantities passed.
     *
     * @param null|Pricing $pricing
     *
     * @return $this
     */
    public function pricing(Pricing $pricing): self
    {
        $pricing->setRequired([
            'quantities'
        ]);

        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/availability/instance/' . $this->instance_id . '/pricing';
        $this->params   = $pricing;

        return $this;
    }

}

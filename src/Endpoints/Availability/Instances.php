<?php

namespace Resova\Endpoints\Availability;

use Resova\Endpoints\Availability;
use Resova\Requests\Pricing;

class Instances extends Availability
{
    /**
     * Retrieve an instance
     * Retrieve the details of a specific instance.
     *
     * @param int $id The Instance Id
     *
     * @return $this
     */
    public function __invoke(int $id): self
    {
        $this->instance_id = $id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/availability/instance/' . $id;

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
    public function pricing(Pricing $pricing = null): self
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = $this->config->get('base_uri') . '/availability/instance/' . $this->instance_id . '/pricing';
        $this->params   = $pricing;

        return $this;
    }

}

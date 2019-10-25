<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class Customer
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class CustomerCreate extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'first_name'    => 'string', // The first name of the customer.
            'last_name'     => 'string', // The last name of the customer.
            'email'         => 'string', // The email for the customer.
            'password'      => 'string', // The password for the customer.
            'mobile'        => 'string', // The mobile number for the customer.
            'telephone'     => 'string', // The telephone number for the customer.
            'address'       => 'string', // The address line 1 of the customer.
            'address2'      => 'string', // The address line 2 of the customer.
            'city'          => 'string', // The city of the customer.
            'county'        => 'string', // The county of the customer.
            'postcode'      => 'string', // The postcode of the customer.
            'country'       => 'string', // The country of the customer.
            // TODO: implement validation like "array of objects"
            'custom_fields' => 'array[CustomField]', // The custom fields for this customer, as dictated by the customers settings. Pass an array of objects.
        ];
    }
}

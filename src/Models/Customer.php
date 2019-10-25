<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class Customer
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Customer extends Model
{

    /*
     * id integer The unique id for the customer object.
ref reference string The unique reference for the customer.
ip string // The ip of the customer.
first_name string The first name of the customer.
last_name string The last name of the customer.
email string The email for the customer.
mobile string The mobile number for the customer.
telephone string The telephone number for the customer.
address string The address of the customer.
address2 string The address2 of the customer.
city string The city of the customer.
county string The county of the customer.
postcode string The postcode of the customer.
country string The country of the customer.

     */

    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'            => 'int',    // The unique id for the customer object.
            'ref'           => 'string', // The unique reference for the customer.
            'ip'            => 'string', // The ip of the customer.
            'first_name'    => 'string', // The first name of the customer.
            'last_name'     => 'string', // The last name of the customer.
            'email'         => 'string', // The email for the customer.
            'mobile'        => 'string', // The mobile number for the customer.
            'telephone'     => 'string', // The telephone number for the customer.
            'password'      => 'string', // The password for the customer.
            'address'       => 'string', // The address line 1 of the customer.
            'address2'      => 'string', // The address line 2 of the customer.
            'city'          => 'string', // The city of the customer.
            'county'        => 'string', // The county of the customer.
            'postcode'      => 'string', // The postcode of the customer.
            'country'       => 'string', // The country of the customer.
            'image'         => 'string', // The profile image of the customer.
            'sales_total'   => 'float',  // The sales (bookings/purchases) total for the customer.
            'paid_total'    => 'float',  // The paid total for the customer.
            'due_total'     => 'float',  // The due total for the customer.
            // TODO: implement validation like "array of objects"
            'custom_fields' => 'array[CustomField]', // The custom fields for this customer, as dictated by the customers settings. Pass an array of objects.
            'credit_total'  => 'float',  // The total amount of credit for the customer.
            'waiver_signed' => 'bool',   // If the customer has signed the waiver, if applicable.
            'waiver'        => 'bool',   // If signed, the waiver object for the customer .
        ];
    }
}

<?php

namespace Resova\Objects;

/**
 * The basket purchase object
 * The purchase object allows you to manage purchases for a basket.
 *
 * @package Resova\Objects
 */
class Purchase
{
    /**
     * The unique id for the purchase object.
     *
     * @var int
     */
    public $id;

    /**
     * The basket purchase subtotal.
     *
     * @var float Positive float or zero
     */
    public $price;

    /**
     * The total discount value of the basket purchase.
     *
     * @var float Positive float or zero
     */
    public $discount;

    /**
     * The fee value of the basket purchase.
     *
     * @var float Positive float or zero
     */
    public $fee;

    /**
     * The tax value of the basket purchase.
     *
     * @var float Positive float or zero
     */
    public $tax;

    /**
     * The total for the basket.
     *
     * @var float Positive float or zero
     */
    public $total;

    /**
     * The total quantity of the purchase.
     *
     * @var integer
     */
    public $total_quantity;

    /**
     * The gift voucher object
     *
     * @var object
     */
    public $gift_voucher;

    /**
     * Gift email for the purchase
     *
     * @var string
     */
    public $gift_email;

    /**
     * Gift message for the purchase
     *
     * @var string
     */
    public $gift_message;
}

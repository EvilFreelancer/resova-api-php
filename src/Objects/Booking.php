<?php

namespace Resova\Objects;

/**
 * The basket booking object
 * The booking object allows you to manage bookings for a basket.
 *
 * @package Resova\Objects
 */
class Booking
{
    /**
     * The unique id for the booking object.
     *
     * @var integer
     */
    public $id;

    /**
     * The item associated with the booking, an instance of the item object.
     *
     * @var object
     */
    public $item;

    /**
     * The time associated with the booking, an instance of the time object
     *
     * @var object
     */
    public $time;

    /**
     * The date of the basket booking.
     *
     * @var string
     */
    public $booking_date;

    /**
     * The time of the basket booking.
     *
     * @var string
     */
    public $booking_time;

    /**
     * The end time of the basket booking.
     *
     * @var string
     */
    public $booking_end;

    /**
     * The duration of the basket booking.
     *
     * @var int (positive)
     */
    public $duration;

    /**
     * The total quantity of spaces for the basket booking.
     *
     * @var int
     */
    public $total_quantity;

    /**
     * The quantities of item pricing categories for this basket booking.
     *
     * @var Quantity[]
     */
    public $quantities;

    /**
     * The item extras for this basket booking.
     *
     * @var array
     */
    public $extras;

    /**
     * The basket booking subtotal.
     *
     * @var float Positive float or zero
     */
    public $price;

    /**
     * The total discount value of the basket.
     *
     * @var float Positive float or zero
     */
    public $discount;

    /**
     * The fee value of the basket booking.
     *
     * @var float Positive float or zero
     */
    public $fee;

    /**
     * The tax value of the basket booking.
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
     * The item booking questions for this basket booking.
     *
     * @var Question[]
     */
    public $questions;

    /**
     * The participants for this basket booking.
     *
     * @var array
     */
    public $participants;

}

<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Issue a credit note to adjust an invoice's amount after the invoice is
 * finalized.
 *
 * Related guide: [Credit Notes](https://stripe.com/docs/billing/invoices/credit-notes).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The integer amount in %s representing the total amount of the credit note, including tax.
 * @property int $amount_shipping This is the sum of all the shipping amounts.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property string|\Stripe\Customer $customer ID of the customer.
 * @property null|string|\Stripe\CustomerBalanceTransaction $customer_balance_transaction Customer balance transaction related to this credit note.
 * @property int $discount_amount The integer amount in %s representing the total amount of discount that was credited.
 * @property \Stripe\StripeObject[] $discount_amounts The aggregate amounts calculated per discount for all line items.
 * @property string|\Stripe\Invoice $invoice ID of the invoice.
 * @property \Stripe\Collection<\Stripe\CreditNoteLineItem> $lines Line items that make up the credit note
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|string $memo Customer-facing text that appears on the credit note PDF.
 * @property null|\Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $number A unique number that identifies this particular credit note and appears on the PDF of the credit note and its associated invoice.
 * @property null|int $out_of_band_amount Amount that was credited outside of Stripe.
 * @property string $pdf The link to download the PDF of the credit note.
 * @property null|string $reason Reason for issuing this credit note, one of `duplicate`, `fraudulent`, `order_change`, or `product_unsatisfactory`
 * @property null|string|\Stripe\Refund $refund Refund related to this credit note.
 * @property null|\Stripe\StripeObject $shipping_cost The details of the cost of shipping, including the ShippingRate applied to the invoice.
 * @property string $status Status of this credit note, one of `issued` or `void`. Learn more about [voiding credit notes](https://stripe.com/docs/billing/invoices/credit-notes#voiding).
 * @property int $subtotal The integer amount in %s representing the amount of the credit note, excluding exclusive tax and invoice level discounts.
 * @property null|int $subtotal_excluding_tax The integer amount in %s representing the amount of the credit note, excluding all tax and invoice level discounts.
 * @property \Stripe\StripeObject[] $tax_amounts The aggregate amounts calculated per tax rate for all line items.
 * @property int $total The integer amount in %s representing the total amount of the credit note, including tax and all discount.
 * @property null|int $total_excluding_tax The integer amount in %s representing the total amount of the credit note, excluding tax, but including discounts.
 * @property string $type Type of this credit note, one of `pre_payment` or `post_payment`. A `pre_payment` credit note means it was issued when the invoice was open. A `post_payment` credit note means it was issued when the invoice was paid.
 * @property null|int $voided_at The time that the credit note was voided.
 */
class CreditNote extends ApiResource
{
    const OBJECT_NAME = 'credit_note';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const REASON_DUPLICATE = 'duplicate';
    const REASON_FRAUDULENT = 'fraudulent';
    const REASON_ORDER_CHANGE = 'order_change';
    const REASON_PRODUCT_UNSATISFACTORY = 'product_unsatisfactory';

    const STATUS_ISSUED = 'issued';
    const STATUS_VOID = 'void';

    const TYPE_POST_PAYMENT = 'post_payment';
    const TYPE_PRE_PAYMENT = 'pre_payment';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote the previewed credit note
     */
    public static function preview($params = null, $opts = null)
    {
        $url = static::classUrl() . '/preview';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\CreditNoteLineItem> list of CreditNoteLineItems
     */
    public static function previewLines($params = null, $opts = null)
    {
        $url = static::classUrl() . '/preview/lines';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote the voided credit note
     */
    public function voidCreditNote($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/void';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    const PATH_LINES = '/lines';

    /**
     * @param string $id the ID of the credit note on which to retrieve the credit note line items
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\CreditNoteLineItem> the list of credit note line items
     */
    public static function allLines($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_LINES, $params, $opts);
    }
}

<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Products describe the specific goods or services you offer to your customers.
 * For example, you might offer a Standard and Premium version of your goods or
 * service; each version would be a separate Product. They can be used in
 * conjunction with [Prices](https://stripe.com/docs/api#prices) to
 * configure pricing in Payment Links, Checkout, and Subscriptions.
 *
 * Related guides: [Set up a subscription](https://stripe.com/docs/billing/subscriptions/set-up-subscription), [share a Payment Link](https://stripe.com/docs/payment-links), [accept payments with Checkout](https://stripe.com/docs/payments/accept-a-payment#create-product-prices-upfront), and more about [Products and Prices](https://stripe.com/docs/products-prices/overview)
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the product is currently available for purchase.
 * @property null|string[] $attributes A list of up to 5 attributes that each SKU can provide values for (e.g., `[&quot;color&quot;, &quot;size&quot;]`).
 * @property null|string $caption A short one-line description of the product, meant to be displayable to the customer. Only applicable to products of `type=good`.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string[] $deactivate_on An array of connect application identifiers that cannot purchase this product. Only applicable to products of `type=good`.
 * @property null|string|\Stripe\Price $default_price The ID of the [Price](https://stripe.com/docs/api/prices) object that is the default price for this product.
 * @property null|string $description The product's description, meant to be displayable to the customer. Use this field to optionally store a long form explanation of the product being sold for your own rendering purposes.
 * @property string[] $images A list of up to 8 URLs of images for this product, meant to be displayable to the customer.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The product's name, meant to be displayable to the customer.
 * @property null|\Stripe\StripeObject $package_dimensions The dimensions of this product for shipping purposes.
 * @property null|bool $shippable Whether this product is shipped (i.e., physical goods).
 * @property null|string $statement_descriptor Extra information about a product which will appear on your customer's credit card statement. In the case that multiple products are billed at once, the first statement descriptor will be used.
 * @property null|string|\Stripe\TaxCode $tax_code A [tax code](https://stripe.com/docs/tax/tax-categories) ID.
 * @property string $type The type of the product. The product is either of type `good`, which is eligible for use with Orders and SKUs, or `service`, which is eligible for use with Subscriptions and Plans.
 * @property null|string $unit_label A label that represents units of this product. When set, this will be included in customers' receipts, invoices, Checkout, and the customer portal.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 * @property null|string $url A URL of a publicly-accessible webpage for this product.
 */
class Product extends ApiResource
{
    const OBJECT_NAME = 'product';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Search;
    use ApiOperations\Update;

    const TYPE_GOOD = 'good';
    const TYPE_SERVICE = 'service';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<Product> the product search results
     */
    public static function search($params = null, $opts = null)
    {
        $url = '/v1/products/search';

        return self::_searchResource($url, $params, $opts);
    }
}

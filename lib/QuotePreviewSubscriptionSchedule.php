<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string|\Stripe\Application $application ID of the Connect Application that created the schedule.
 * @property (object{new_reference: null|string, subscription_schedule: null|string, type: string}&\Stripe\StripeObject&\stdClass) $applies_to
 * @property null|string $billing_behavior Configures when the subscription schedule generates prorations for phase transitions. Possible values are <code>prorate_on_next_phase</code> or <code>prorate_up_front</code> with the default being <code>prorate_on_next_phase</code>. <code>prorate_on_next_phase</code> will apply phase changes and generate prorations at transition time. <code>prorate_up_front</code> will bill for all phases within the current billing cycle up front.
 * @property null|int $canceled_at Time at which the subscription schedule was canceled. Measured in seconds since the Unix epoch.
 * @property null|int $completed_at Time at which the subscription schedule was completed. Measured in seconds since the Unix epoch.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{end_date: int, start_date: int}&\Stripe\StripeObject&\stdClass) $current_phase Object representing the start and end dates for the current phase of the subscription schedule, if it is <code>active</code>.
 * @property string|\Stripe\Customer $customer ID of the customer who owns the subscription schedule.
 * @property (object{application_fee_percent: null|float, automatic_tax?: (object{disabled_reason: null|string, enabled: bool, liability: null|(object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), billing_cycle_anchor: string, billing_thresholds: null|(object{amount_gte: null|int, reset_billing_cycle_anchor: null|bool}&\Stripe\StripeObject&\stdClass), collection_method: null|string, default_payment_method: null|string|\Stripe\PaymentMethod, description: null|string, invoice_settings: (object{account_tax_ids: null|(string|\Stripe\TaxId)[], days_until_due: null|int, issuer: (object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), on_behalf_of: null|string|\Stripe\Account, transfer_data: null|(object{amount_percent: null|float, destination: string|\Stripe\Account}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $default_settings
 * @property string $end_behavior Behavior of the subscription schedule and underlying subscription when it ends. Possible values are <code>release</code> or <code>cancel</code> with the default being <code>release</code>. <code>release</code> will end the subscription schedule and keep the underlying subscription running. <code>cancel</code> will end the subscription schedule and cancel the underlying subscription.
 * @property null|(object{errored_at: int, failed_transitions: (object{source_price: string, target_price: string}&\Stripe\StripeObject&\stdClass)[], type: string}&\Stripe\StripeObject&\stdClass) $last_price_migration_error Details of the most recent price migration that failed for the subscription schedule.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property ((object{add_invoice_items: ((object{discounts: ((object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass))[], price: string|\Stripe\Price, quantity: null|int, tax_rates?: null|\Stripe\TaxRate[]}&\Stripe\StripeObject&\stdClass))[], application_fee_percent: null|float, automatic_tax?: (object{disabled_reason: null|string, enabled: bool, liability: null|(object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), billing_cycle_anchor: null|string, billing_thresholds: null|(object{amount_gte: null|int, reset_billing_cycle_anchor: null|bool}&\Stripe\StripeObject&\stdClass), collection_method: null|string, coupon: null|string|\Stripe\Coupon, currency: string, default_payment_method: null|string|\Stripe\PaymentMethod, default_tax_rates?: null|\Stripe\TaxRate[], description: null|string, discounts: ((object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass))[], end_date: int, invoice_settings: null|(object{account_tax_ids: null|(string|\Stripe\TaxId)[], days_until_due: null|int, issuer: null|(object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), items: ((object{billing_thresholds: null|(object{usage_gte: null|int}&\Stripe\StripeObject&\stdClass), discounts: ((object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass))[], metadata: null|\Stripe\StripeObject, plan: string|\Stripe\Plan, price: string|\Stripe\Price, quantity?: int, tax_rates?: null|\Stripe\TaxRate[], trial?: null|(object{converts_to?: null|string[], type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass))[], metadata: null|\Stripe\StripeObject, on_behalf_of: null|string|\Stripe\Account, pause_collection?: null|(object{behavior: string}&\Stripe\StripeObject&\stdClass), proration_behavior: string, start_date: int, transfer_data: null|(object{amount_percent: null|float, destination: string|\Stripe\Account}&\Stripe\StripeObject&\stdClass), trial_continuation?: null|string, trial_end: null|int, trial_settings?: null|(object{end_behavior: null|(object{prorate_up_front: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass))[] $phases Configuration for the subscription schedule's phases.
 * @property null|(object{invoice: string|\Stripe\Invoice, period_end: int, period_start: int, update_behavior?: string}&\Stripe\StripeObject&\stdClass) $prebilling Time period and invoice for a Subscription billed in advance.
 * @property null|int $released_at Time at which the subscription schedule was released. Measured in seconds since the Unix epoch.
 * @property null|string $released_subscription ID of the subscription once managed by the subscription schedule (if it is released).
 * @property string $status The present status of the subscription schedule. Possible values are <code>not_started</code>, <code>active</code>, <code>completed</code>, <code>released</code>, and <code>canceled</code>. You can read more about the different states in our <a href="https://stripe.com/docs/billing/subscriptions/subscription-schedules">behavior guide</a>.
 * @property null|string|\Stripe\Subscription $subscription ID of the subscription managed by the subscription schedule.
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this subscription schedule belongs to.
 */
class QuotePreviewSubscriptionSchedule extends ApiResource
{
    const OBJECT_NAME = 'quote_preview_subscription_schedule';

    const BILLING_BEHAVIOR_PRORATE_ON_NEXT_PHASE = 'prorate_on_next_phase';
    const BILLING_BEHAVIOR_PRORATE_UP_FRONT = 'prorate_up_front';

    const END_BEHAVIOR_CANCEL = 'cancel';
    const END_BEHAVIOR_NONE = 'none';
    const END_BEHAVIOR_RELEASE = 'release';
    const END_BEHAVIOR_RENEW = 'renew';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_COMPLETED = 'completed';
    const STATUS_NOT_STARTED = 'not_started';
    const STATUS_RELEASED = 'released';
}

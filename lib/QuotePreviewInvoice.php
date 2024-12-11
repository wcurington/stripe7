<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Invoices are statements of amounts owed by a customer, and are either
 * generated one-off, or generated periodically from a subscription.
 *
 * They contain <a href="https://stripe.com/docs/api#invoiceitems">invoice items</a>, and proration adjustments
 * that may be caused by subscription upgrades/downgrades (if necessary).
 *
 * If your invoice is configured to be billed through automatic charges,
 * Stripe automatically finalizes your invoice and attempts payment. Note
 * that finalizing the invoice,
 * <a href="https://stripe.com/docs/invoicing/integration/automatic-advancement-collection">when automatic</a>, does
 * not happen immediately as the invoice is created. Stripe waits
 * until one hour after the last webhook was successfully sent (or the last
 * webhook timed out after failing). If you (and the platforms you may have
 * connected to) have no webhooks configured, Stripe waits one hour after
 * creation to finalize the invoice.
 *
 * If your invoice is configured to be billed by sending an email, then based on your
 * <a href="https://dashboard.stripe.com/account/billing/automatic">email settings</a>,
 * Stripe will email the invoice to your customer and await payment. These
 * emails can contain a link to a hosted page to pay the invoice.
 *
 * Stripe applies any customer credit on the account before determining the
 * amount due for the invoice (i.e., the amount that will be actually
 * charged). If the amount due for the invoice is less than Stripe's <a href="/docs/currencies#minimum-and-maximum-charge-amounts">minimum allowed charge
 * per currency</a>, the
 * invoice is automatically marked paid, and we add the amount due to the
 * customer's credit balance which is applied to the next invoice.
 *
 * More details on the customer's credit balance are
 * <a href="https://stripe.com/docs/billing/customer/balance">here</a>.
 *
 * Related guide: <a href="https://stripe.com/docs/billing/invoices/sending">Send invoices to customers</a>
 *
 * @property string $id Unique identifier for the object. This property is always present unless the invoice is an upcoming invoice. See <a href="https://stripe.com/docs/api/invoices/upcoming">Retrieve an upcoming invoice</a> for more details.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $account_country The country of the business associated with this invoice, most often the business creating the invoice.
 * @property null|string $account_name The public name of the business associated with this invoice, most often the business creating the invoice.
 * @property null|(string|\Stripe\TaxId)[] $account_tax_ids The account tax IDs associated with the invoice. Only editable when the invoice is a draft.
 * @property int $amount_due Final amount due at this time for this invoice. If the invoice's total is smaller than the minimum charge amount, for example, or if there is account credit that can be applied to the invoice, the <code>amount_due</code> may be 0. If there is a positive <code>starting_balance</code> for the invoice (the customer owes money), the <code>amount_due</code> will also take that into account. The charge that gets generated for the invoice will be for the amount specified in <code>amount_due</code>.
 * @property null|int $amount_overpaid Amount that was overpaid on the invoice. Overpayments are debited to the customer's credit balance.
 * @property int $amount_paid The amount, in cents (or local equivalent), that was paid.
 * @property int $amount_remaining The difference between amount_due and amount_paid, in cents (or local equivalent).
 * @property int $amount_shipping This is the sum of all the shipping amounts.
 * @property null|(object{amount: int, amount_paid: int, amount_remaining: int, days_until_due: null|int, description: null|string, due_date: null|int, paid_at: null|int, status: string}&\Stripe\StripeObject&\stdClass)[] $amounts_due List of expected payments and corresponding due dates. This value will be null for invoices where collection_method=charge_automatically.
 * @property null|string|\Stripe\Application $application ID of the Connect Application that created the invoice.
 * @property null|int $application_fee_amount The fee in cents (or local equivalent) that will be applied to the invoice and transferred to the application owner's Stripe account when the invoice is paid.
 * @property object{new_reference: null|string, subscription_schedule: null|string, type: string}&\Stripe\StripeObject&\stdClass $applies_to
 * @property int $attempt_count Number of payment attempts made for this invoice, from the perspective of the payment retry schedule. Any payment attempt counts as the first attempt, and subsequently only automatic retries increment the attempt count. In other words, manual payment attempts after the first attempt do not affect the retry schedule. If a failure is returned with a non-retryable return code, the invoice can no longer be retried unless a new payment method is obtained. Retries will continue to be scheduled, and attempt_count will continue to increment, but retries will only be executed if a new payment method is obtained.
 * @property bool $attempted Whether an attempt has been made to pay the invoice. An invoice is not attempted until 1 hour after the <code>invoice.created</code> webhook, for example, so you might not want to display that invoice as unpaid to your users.
 * @property object{disabled_reason: null|string, enabled: bool, liability: null|object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass, status: null|string}&\Stripe\StripeObject&\stdClass $automatic_tax
 * @property null|int $automatically_finalizes_at The time when this invoice is currently scheduled to be automatically finalized. The field will be <code>null</code> if the invoice is not scheduled to finalize in the future. If the invoice is not in the draft state, this field will always be <code>null</code> - see <code>finalized_at</code> for the time when an already-finalized invoice was finalized.
 * @property null|string $billing_reason <p>Indicates the reason why the invoice was created.</p><p>* <code>manual</code>: Unrelated to a subscription, for example, created via the invoice editor. * <code>subscription</code>: No longer in use. Applies to subscriptions from before May 2018 where no distinction was made between updates, cycles, and thresholds. * <code>subscription_create</code>: A new subscription was created. * <code>subscription_cycle</code>: A subscription advanced into a new period. * <code>subscription_threshold</code>: A subscription reached a billing threshold. * <code>subscription_update</code>: A subscription was updated. * <code>upcoming</code>: Reserved for simulated invoices, per the upcoming invoice endpoint.</p>
 * @property string $collection_method Either <code>charge_automatically</code>, or <code>send_invoice</code>. When charging automatically, Stripe will attempt to pay this invoice using the default source attached to the customer. When sending an invoice, Stripe will email this invoice to the customer with payment instructions.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|object{name: string, value: string}&\Stripe\StripeObject&\stdClass[] $custom_fields Custom fields displayed on the invoice.
 * @property null|object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass $customer_address The customer's address. Until the invoice is finalized, this field will equal <code>customer.address</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|string $customer_email The customer's email. Until the invoice is finalized, this field will equal <code>customer.email</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|string $customer_name The customer's name. Until the invoice is finalized, this field will equal <code>customer.name</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|string $customer_phone The customer's phone number. Until the invoice is finalized, this field will equal <code>customer.phone</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|object{address?: object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass, carrier?: null|string, name?: string, phone?: null|string, tracking_number?: null|string}&\Stripe\StripeObject&\stdClass $customer_shipping The customer's shipping information. Until the invoice is finalized, this field will equal <code>customer.shipping</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|string $customer_tax_exempt The customer's tax exempt status. Until the invoice is finalized, this field will equal <code>customer.tax_exempt</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|(object{type: string, value: null|string}&\Stripe\StripeObject&\stdClass)[] $customer_tax_ids The customer's tax IDs. Until the invoice is finalized, this field will contain the same tax IDs as <code>customer.tax_ids</code>. Once the invoice is finalized, this field will no longer be updated.
 * @property null|(string|\Stripe\Margin)[] $default_margins The margins applied to the invoice. Can be overridden by line item <code>margins</code>. Use <code>expand[]=default_margins</code> to expand each margin.
 * @property null|string|\Stripe\PaymentMethod $default_payment_method ID of the default payment method for the invoice. It must belong to the customer associated with the invoice. If not set, defaults to the subscription's default payment method, if any, or to the default payment method in the customer's invoice settings.
 * @property null|string|\Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source $default_source ID of the default payment source for the invoice. It must belong to the customer associated with the invoice and be in a chargeable state. If not set, defaults to the subscription's default source, if any, or to the customer's default source.
 * @property \Stripe\TaxRate[] $default_tax_rates The tax rates applied to this invoice, if any.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users. Referenced as 'memo' in the Dashboard.
 * @property null|\Stripe\Discount $discount Describes the current discount applied to this invoice, if there is one. Not populated if there are multiple discounts.
 * @property (string|\Stripe\Discount)[] $discounts The discounts applied to the invoice. Line item discounts are applied before invoice discounts. Use <code>expand[]=discounts</code> to expand each discount.
 * @property null|int $due_date The date on which payment for this invoice is due. This value will be <code>null</code> for invoices where <code>collection_method=charge_automatically</code>.
 * @property null|int $effective_at The date when this invoice is in effect. Same as <code>finalized_at</code> unless overwritten. When defined, this value replaces the system-generated 'Date of issue' printed on the invoice PDF and receipt.
 * @property null|int $ending_balance Ending customer balance after the invoice is finalized. Invoices are finalized approximately an hour after successful webhook delivery or when payment collection is attempted for the invoice. If the invoice has not been finalized yet, this will be null.
 * @property null|string $footer Footer displayed on the invoice.
 * @property null|object{action: string, invoice: string|\Stripe\Invoice}&\Stripe\StripeObject&\stdClass $from_invoice Details of the invoice that was cloned. See the <a href="https://stripe.com/docs/invoicing/invoice-revisions">revision documentation</a> for more details.
 * @property object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass $issuer
 * @property null|object{charge?: string, code?: string, decline_code?: string, doc_url?: string, message?: string, network_advice_code?: string, network_decline_code?: string, param?: string, payment_intent?: \Stripe\PaymentIntent, payment_method?: \Stripe\PaymentMethod, payment_method_type?: string, request_log_url?: string, setup_intent?: \Stripe\SetupIntent, source?: \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source, type: string}&\Stripe\StripeObject&\stdClass $last_finalization_error The error encountered during the previous attempt to finalize the invoice. This field is cleared when the invoice is successfully finalized.
 * @property null|string|\Stripe\Invoice $latest_revision The ID of the most recent non-draft revision of this invoice
 * @property \Stripe\Collection<\Stripe\InvoiceLineItem> $lines The individual line items that make up the invoice. <code>lines</code> is sorted as follows: (1) pending invoice items (including prorations) in reverse chronological order, (2) subscription items in reverse chronological order, and (3) invoice items added after invoice creation in chronological order.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|int $next_payment_attempt The time at which payment will next be attempted. This value will be <code>null</code> for invoices where <code>collection_method=send_invoice</code>.
 * @property null|string $number A unique, identifying string that appears on emails sent to the customer for this invoice. This starts with the customer's unique invoice_prefix if it is specified.
 * @property null|string|\Stripe\Account $on_behalf_of The account (if any) for which the funds of the invoice payment are intended. If set, the invoice will be presented with the branding and support information of the specified account. See the <a href="https://stripe.com/docs/billing/invoices/connect">Invoices with Connect</a> documentation for details.
 * @property bool $paid Whether payment was successfully collected for this invoice. An invoice can be paid (most commonly) with a charge or with credit from the customer's account balance.
 * @property bool $paid_out_of_band Returns true if the invoice was manually marked paid, returns false if the invoice hasn't been paid yet or was paid on Stripe.
 * @property null|string|\Stripe\PaymentIntent $payment_intent The PaymentIntent associated with this invoice. The PaymentIntent is generated when the invoice is finalized, and can then be used to pay the invoice. Note that voiding an invoice will cancel the PaymentIntent.
 * @property object{default_mandate: null|string, payment_method_options: null|object{acss_debit: null|object{mandate_options?: object{transaction_type: null|string}&\Stripe\StripeObject&\stdClass, verification_method?: string}&\Stripe\StripeObject&\stdClass, bancontact: null|object{preferred_language: string}&\Stripe\StripeObject&\stdClass, card: null|object{installments?: object{enabled: null|bool}&\Stripe\StripeObject&\stdClass, request_three_d_secure: null|string}&\Stripe\StripeObject&\stdClass, customer_balance: null|object{bank_transfer?: object{eu_bank_transfer?: object{country: string}&\Stripe\StripeObject&\stdClass, type: null|string}&\Stripe\StripeObject&\stdClass, funding_type: null|string}&\Stripe\StripeObject&\stdClass, id_bank_transfer?: null|object{}&\Stripe\StripeObject&\stdClass, konbini: null|object{}&\Stripe\StripeObject&\stdClass, sepa_debit: null|object{}&\Stripe\StripeObject&\stdClass, us_bank_account: null|object{financial_connections?: object{filters?: object{account_subcategories?: string[], institution?: string}&\Stripe\StripeObject&\stdClass, permissions?: string[], prefetch: null|string[]}&\Stripe\StripeObject&\stdClass, verification_method?: string}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass, payment_method_types: null|string[]}&\Stripe\StripeObject&\stdClass $payment_settings
 * @property null|\Stripe\Collection<\Stripe\InvoicePayment> $payments Payments for this invoice
 * @property int $period_end End of the usage period during which invoice items were added to this invoice. This looks back one period for a subscription invoice. Use the <a href="/api/invoices/line_item#invoice_line_item_object-period">line item period</a> to get the service period for each price.
 * @property int $period_start Start of the usage period during which invoice items were added to this invoice. This looks back one period for a subscription invoice. Use the <a href="/api/invoices/line_item#invoice_line_item_object-period">line item period</a> to get the service period for each price.
 * @property int $post_payment_credit_notes_amount Total amount of all post-payment credit notes issued for this invoice.
 * @property int $pre_payment_credit_notes_amount Total amount of all pre-payment credit notes issued for this invoice.
 * @property null|string|\Stripe\Quote $quote The quote this invoice was generated from.
 * @property null|string $receipt_number This is the transaction number that appears on email receipts sent for this invoice.
 * @property null|object{amount_tax_display: null|string, pdf: null|object{page_size: null|string}&\Stripe\StripeObject&\stdClass, template: null|string, template_version: null|int}&\Stripe\StripeObject&\stdClass $rendering The rendering-related settings that control how the invoice is displayed on customer-facing surfaces such as PDF and Hosted Invoice Page.
 * @property null|object{amount_subtotal: int, amount_tax: int, amount_total: int, shipping_rate: null|string|\Stripe\ShippingRate, taxes?: (object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass)[]}&\Stripe\StripeObject&\stdClass $shipping_cost The details of the cost of shipping, including the ShippingRate applied on the invoice.
 * @property null|object{address?: object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass, carrier?: null|string, name?: string, phone?: null|string, tracking_number?: null|string}&\Stripe\StripeObject&\stdClass $shipping_details Shipping details for the invoice. The Invoice PDF will use the <code>shipping_details</code> value if it is set, otherwise the PDF will render the shipping address from the customer.
 * @property int $starting_balance Starting customer balance before the invoice is finalized. If the invoice has not been finalized yet, this will be the current customer balance. For revision invoices, this also includes any customer balance that was applied to the original invoice.
 * @property null|string $statement_descriptor Extra information about an invoice for the customer's credit card statement.
 * @property null|string $status The status of the invoice, one of <code>draft</code>, <code>open</code>, <code>paid</code>, <code>uncollectible</code>, or <code>void</code>. <a href="https://stripe.com/docs/billing/invoices/workflow#workflow-overview">Learn more</a>
 * @property object{finalized_at: null|int, marked_uncollectible_at: null|int, paid_at: null|int, voided_at: null|int}&\Stripe\StripeObject&\stdClass $status_transitions
 * @property null|string|\Stripe\Subscription $subscription
 * @property null|object{metadata: null|StripeObject, pause_collection?: null|object{behavior: string, resumes_at: null|int}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass $subscription_details Details about the subscription that created this invoice.
 * @property null|int $subscription_proration_date Only set for upcoming invoices that preview prorations. The time used to calculate prorations.
 * @property int $subtotal Total of all subscriptions, invoice items, and prorations on the invoice before any invoice level discount or exclusive tax is applied. Item discounts are already incorporated
 * @property null|int $subtotal_excluding_tax The integer amount in cents (or local equivalent) representing the subtotal of the invoice before any invoice level discount or tax is applied. Item discounts are already incorporated
 * @property null|int $tax The amount of tax on this invoice. This is the sum of all the tax amounts on this invoice.
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this invoice belongs to.
 * @property object{amount_gte: null|int, item_reasons: object{line_item_ids: string[], usage_gte: int}&\Stripe\StripeObject&\stdClass[]}&\Stripe\StripeObject&\stdClass $threshold_reason
 * @property int $total Total after discounts and taxes.
 * @property null|(object{amount: int, discount: string|\Stripe\Discount}&\Stripe\StripeObject&\stdClass)[] $total_discount_amounts The aggregate amounts calculated per discount across all line items.
 * @property null|int $total_excluding_tax The integer amount in cents (or local equivalent) representing the total amount of the invoice including all discounts but excluding all tax.
 * @property null|(object{amount: int, margin: string|\Stripe\Margin}&\Stripe\StripeObject&\stdClass)[] $total_margin_amounts The aggregate amounts calculated per margin across all line items.
 * @property null|(object{amount: int, credit_balance_transaction?: null|string|\Stripe\Billing\CreditBalanceTransaction, discount?: string|\Stripe\Discount, margin?: string|\Stripe\Margin, type: string}&\Stripe\StripeObject&\stdClass)[] $total_pretax_credit_amounts Contains pretax credit amounts (ex: discount, credit grants, etc) that apply to this invoice. This is a combined list of total_pretax_credit_amounts across all invoice line items.
 * @property (object{amount: int, inclusive: bool, tax_rate: string|\Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass)[] $total_tax_amounts The aggregate amounts calculated per tax rate for all line items.
 * @property null|object{amount: null|int, destination: string|\Stripe\Account}&\Stripe\StripeObject&\stdClass $transfer_data The account (if any) the payment will be attributed to for tax reporting, and where funds from the payment will be transferred to for the invoice.
 * @property null|int $webhooks_delivered_at Invoices are automatically paid or sent 1 hour after webhooks are delivered, or until all webhook delivery attempts have <a href="https://stripe.com/docs/billing/webhooks#understand">been exhausted</a>. This field tracks the time when webhooks for this invoice were successfully delivered. If the invoice had no webhooks to deliver, this will be set while the invoice is being created.
 */
class QuotePreviewInvoice extends ApiResource
{
    const OBJECT_NAME = 'quote_preview_invoice';

    const BILLING_REASON_AUTOMATIC_PENDING_INVOICE_ITEM_INVOICE = 'automatic_pending_invoice_item_invoice';
    const BILLING_REASON_MANUAL = 'manual';
    const BILLING_REASON_QUOTE_ACCEPT = 'quote_accept';
    const BILLING_REASON_SUBSCRIPTION = 'subscription';
    const BILLING_REASON_SUBSCRIPTION_CREATE = 'subscription_create';
    const BILLING_REASON_SUBSCRIPTION_CYCLE = 'subscription_cycle';
    const BILLING_REASON_SUBSCRIPTION_THRESHOLD = 'subscription_threshold';
    const BILLING_REASON_SUBSCRIPTION_UPDATE = 'subscription_update';
    const BILLING_REASON_UPCOMING = 'upcoming';

    const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';

    const CUSTOMER_TAX_EXEMPT_EXEMPT = 'exempt';
    const CUSTOMER_TAX_EXEMPT_NONE = 'none';
    const CUSTOMER_TAX_EXEMPT_REVERSE = 'reverse';

    const STATUS_DRAFT = 'draft';
    const STATUS_OPEN = 'open';
    const STATUS_PAID = 'paid';
    const STATUS_UNCOLLECTIBLE = 'uncollectible';
    const STATUS_VOID = 'void';
}

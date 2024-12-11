<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * A Reader represents a physical device for accepting payment details.
 *
 * Related guide: <a href="https://stripe.com/docs/terminal/payments/connect-reader">Connecting to a reader</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|object{collect_inputs?: object{inputs: (object{custom_text: null|object{description: null|string, skip_button: null|string, submit_button: null|string, title: null|string}&\Stripe\StripeObject&\stdClass, email?: object{value: null|string}&\Stripe\StripeObject&\stdClass, numeric?: object{value: null|string}&\Stripe\StripeObject&\stdClass, phone?: object{value: null|string}&\Stripe\StripeObject&\stdClass, required: null|bool, selection?: object{choices: (object{style: null|string, value: string}&\Stripe\StripeObject&\stdClass)[], value: null|string}&\Stripe\StripeObject&\stdClass, signature?: object{value: null|string}&\Stripe\StripeObject&\stdClass, skipped?: bool, text?: object{value: null|string}&\Stripe\StripeObject&\stdClass, toggles: null|(object{default_value: null|string, description: null|string, title: null|string, value: null|string}&\Stripe\StripeObject&\stdClass)[], type: string}&\Stripe\StripeObject&\stdClass)[], metadata: null|StripeObject}&\Stripe\StripeObject&\stdClass, collect_payment_method?: object{collect_config?: object{enable_customer_cancellation?: bool, skip_tipping?: bool, tipping?: object{amount_eligible?: int}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass, payment_intent: string|\Stripe\PaymentIntent, payment_method?: \Stripe\PaymentMethod, stripe_account?: string}&\Stripe\StripeObject&\stdClass, confirm_payment_intent?: object{payment_intent: string|\Stripe\PaymentIntent, stripe_account?: string}&\Stripe\StripeObject&\stdClass, failure_code: null|string, failure_message: null|string, process_payment_intent?: object{payment_intent: string|\Stripe\PaymentIntent, process_config?: object{enable_customer_cancellation?: bool, skip_tipping?: bool, tipping?: object{amount_eligible?: int}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass, stripe_account?: string}&\Stripe\StripeObject&\stdClass, process_setup_intent?: object{generated_card?: string, process_config?: object{enable_customer_cancellation?: bool}&\Stripe\StripeObject&\stdClass, setup_intent: string|\Stripe\SetupIntent}&\Stripe\StripeObject&\stdClass, refund_payment?: object{amount?: int, charge?: string|\Stripe\Charge, metadata?: \Stripe\StripeObject, payment_intent?: string|\Stripe\PaymentIntent, reason?: string, refund?: string|\Stripe\Refund, refund_application_fee?: bool, refund_payment_config?: object{enable_customer_cancellation?: bool}&\Stripe\StripeObject&\stdClass, reverse_transfer?: bool, stripe_account?: string}&\Stripe\StripeObject&\stdClass, set_reader_display?: object{cart: null|object{currency: string, line_items: object{amount: int, description: string, quantity: int}&\Stripe\StripeObject&\stdClass[], tax: null|int, total: int}&\Stripe\StripeObject&\stdClass, type: string}&\Stripe\StripeObject&\stdClass, status: string, type: string}&\Stripe\StripeObject&\stdClass $action The most recent action performed by the reader.
 * @property null|string $device_sw_version The current software version of the reader.
 * @property string $device_type Type of reader, one of <code>bbpos_wisepad3</code>, <code>stripe_m2</code>, <code>stripe_s700</code>, <code>bbpos_chipper2x</code>, <code>bbpos_wisepos_e</code>, <code>verifone_P400</code>, <code>simulated_wisepos_e</code>, or <code>mobile_phone_reader</code>.
 * @property null|string $ip_address The local IP address of the reader.
 * @property string $label Custom label given to the reader for easier identification.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string|\Stripe\Terminal\Location $location The location identifier of the reader.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $serial_number Serial number of the reader.
 * @property null|string $status The networking status of the reader. We do not recommend using this field in flows that may block taking payments.
 */
class Reader extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.reader';

    use \Stripe\ApiOperations\Update;

    const DEVICE_TYPE_BBPOS_CHIPPER2X = 'bbpos_chipper2x';
    const DEVICE_TYPE_BBPOS_WISEPAD3 = 'bbpos_wisepad3';
    const DEVICE_TYPE_BBPOS_WISEPOS_E = 'bbpos_wisepos_e';
    const DEVICE_TYPE_MOBILE_PHONE_READER = 'mobile_phone_reader';
    const DEVICE_TYPE_SIMULATED_WISEPOS_E = 'simulated_wisepos_e';
    const DEVICE_TYPE_STRIPE_M2 = 'stripe_m2';
    const DEVICE_TYPE_STRIPE_S700 = 'stripe_s700';
    const DEVICE_TYPE_VERIFONE_P400 = 'verifone_P400';

    const STATUS_OFFLINE = 'offline';
    const STATUS_ONLINE = 'online';

    /**
     * Creates a new <code>Reader</code> object.
     *
     * @param null|array{expand?: string[], label?: string, location?: string, metadata?: null|StripeObject, registration_code: string} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Deletes a <code>Reader</code> object.
     *
     * @param null|array{{}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the deleted resource
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of <code>Reader</code> objects.
     *
     * @param null|array{device_type?: string, ending_before?: string, expand?: string[], limit?: int, location?: string, serial_number?: string, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Terminal\Reader> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>Reader</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a <code>Reader</code> object by setting the values of the parameters
     * passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], label?: null|string, metadata?: null|StripeObject} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
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
     * @return \Stripe\Terminal\Reader the canceled reader
     */
    public function cancelAction($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel_action';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the collected reader
     */
    public function collectInputs($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/collect_inputs';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the collected reader
     */
    public function collectPaymentMethod($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/collect_payment_method';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the confirmed reader
     */
    public function confirmPaymentIntent($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/confirm_payment_intent';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the processed reader
     */
    public function processPaymentIntent($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/process_payment_intent';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the processed reader
     */
    public function processSetupIntent($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/process_setup_intent';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the refunded reader
     */
    public function refundPayment($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/refund_payment';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the seted reader
     */
    public function setReaderDisplay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/set_reader_display';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}

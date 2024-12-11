<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * A Financial Connections Session is the secure way to programmatically launch the client-side Stripe.js modal that lets your users link their accounts.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|object{account?: string|\Stripe\Account, customer?: string|\Stripe\Customer, type: string}&\Stripe\StripeObject&\stdClass $account_holder The account holder for whom accounts are collected in this session.
 * @property \Stripe\Collection<\Stripe\FinancialConnections\Account> $accounts The accounts that were collected as part of this Session.
 * @property string $client_secret A value that will be passed to the client to launch the authentication flow.
 * @property object{account_subcategories: null|string[], countries: null|string[], institution?: string}&\Stripe\StripeObject&\stdClass $filters
 * @property null|object{accounts: int}&\Stripe\StripeObject&\stdClass $limits
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|object{}&\Stripe\StripeObject&\stdClass $manual_entry
 * @property string[] $permissions Permissions requested for accounts collected during this session.
 * @property null|string[] $prefetch Data features requested to be retrieved upon account creation.
 * @property null|string $return_url For webview integrations only. Upon completing OAuth login in the native browser, the user will be redirected to this URL to return to your app.
 * @property null|string $status The current state of the session.
 * @property null|object{cancelled?: object{reason: string}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass $status_details
 */
class Session extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.session';

    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * To launch the Financial Connections authorization flow, create a
     * <code>Session</code>. The session’s <code>client_secret</code> can be used to
     * launch the flow using Stripe.js.
     *
     * @param null|array{account_holder: array{account?: string, customer?: string, type: string}, expand?: string[], filters?: array{account_subcategories?: string[], countries?: string[], institution?: string}, limits?: array{accounts: int}, manual_entry?: array{mode?: string}, permissions: string[], prefetch?: string[], return_url?: string} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Session the created resource
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
     * Retrieves the details of a Financial Connections <code>Session</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Session
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}

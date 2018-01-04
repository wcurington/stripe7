<?php

namespace Stripe;

/**
 * Class Source
 *
 * @package Stripe
 */
class Source extends ApiResource
{
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The detached source.
     */
    public function detach($params = null, $options = null)
    {
        self::_validateParams($params);

        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             . "has invalid ID: $id";
            throw new Error\InvalidRequest($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = urlencode(Util\Util::utf8($this['customer']));
            $extn = urlencode(Util\Util::utf8($id));
            $url = "$base/$parentExtn/sources/$extn";

            list($response, $opts) = $this->_request('delete', $url, $params, $options);
            $this->refreshFrom($response, $opts);
            return $this;
        } else {
            $message = "This source object does not appear to be currently attached "
               . "to a customer object.";
            throw new Error\Api($message);
        }
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The detached source.
     *
     * @deprecated Use the `detach` method instead.
     */
    public function delete($params = null, $options = null)
    {
        $this->detach($params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of source transactions.
     */
    public function sourceTransactions($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/source_transactions';
        list($response, $opts) = $this->_request('get', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The verified source.
     */
    public function verify($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}

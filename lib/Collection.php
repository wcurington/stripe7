<?php

namespace Stripe;

/**
 * Class Collection
 *
 * @property string $object
 * @property string $url
 * @property bool $has_more
 * @property mixed $data
 *
 * @package Stripe
 */
class Collection extends StripeObject
{
    use ApiOperations\Request;

    protected $_requestParams = [];

    /**
     * @return string The base URL for the given class.
     */
    public static function baseUrl()
    {
        return Stripe::$apiBase;
    }

    public function setRequestParams($params)
    {
        $this->_requestParams = $params;
    }

    /**
     * @param $params
     * @param $opts
     *
     * @return array|StripeObject
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function all($params = null, $opts = null)
    {
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $this->_requestParams = $params;
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @param $params
     * @param $opts
     *
     * @return array|StripeObject
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function create($params = null, $opts = null)
    {
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->_requestParams = $params;
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @param $id
     * @param $params
     * @param $opts
     *
     * @return array|StripeObject
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        $id = Util\Util::utf8($id);
        $extn = urlencode($id);
        list($response, $opts) = $this->_request(
            'get',
            "$url/$extn",
            $params,
            $opts
        );
        $this->_requestParams = $params;
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @return Util\AutoPagingIterator An iterator that can be used to iterate
     *    across all objects across all pages. As page boundaries are
     *    encountered, the next page will be fetched automatically for
     *    continued iteration.
     */
    public function autoPagingIterator()
    {
        return new Util\AutoPagingIterator($this, $this->_requestParams);
    }

    /**
     * @param $params
     *
     * @return array
     * @throws Error\Api
     */
    private function extractPathAndUpdateParams($params)
    {
        $url = parse_url($this->url);
        if (!isset($url['path'])) {
            throw new Error\Api("Could not parse list url into parts: $url");
        }

        if (isset($url['query'])) {
            // If the URL contains a query param, parse it out into $params so they
            // don't interact weirdly with each other.
            $query = [];
            parse_str($url['query'], $query);
            $params = array_merge($params ?: [], $query);
        }

        return [$url['path'], $params];
    }
}

<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class TaxCalculationService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the line items of a persisted tax calculation as a collection.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     */
    public function allLineItems($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/tax/calculations/%s/line_items', $id), $params, $opts);
    }

    /**
     * Calculates tax based on input and returns a Tax <code>Calculation</code> object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxCalculation
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/calculations', $params, $opts);
    }
}
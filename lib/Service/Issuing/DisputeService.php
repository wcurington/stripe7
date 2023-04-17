<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

class DisputeService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing `Dispute` objects. The objects are sorted
     * in descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Dispute>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/disputes', $params, $opts);
    }

    /**
     * Creates an Issuing `Dispute` object. Individual pieces of evidence
     * within the `evidence` object are optional at this point. Stripe only
     * validates that required evidence is present during submission. Refer to [Dispute reasons and evidence](/docs/issuing/purchases/disputes#dispute-reasons-and-evidence) for more details about evidence requirements.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/disputes', $params, $opts);
    }

    /**
     * Retrieves an Issuing `Dispute` object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/disputes/%s', $id), $params, $opts);
    }

    /**
     * Submits an Issuing `Dispute` to the card network. Stripe validates
     * that all evidence fields required for the dispute’s reason are present. For more
     * details, see [Dispute reasons and evidence](/docs/issuing/purchases/disputes#dispute-reasons-and-evidence).
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function submit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/disputes/%s/submit', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing `Dispute` object by setting the values
     * of the parameters passed. Any parameters not provided will be left unchanged.
     * Properties on the `evidence` object can be unset by passing in an
     * empty string.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/disputes/%s', $id), $params, $opts);
    }
}

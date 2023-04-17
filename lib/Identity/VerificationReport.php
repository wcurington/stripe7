<?php

// File generated from our OpenAPI spec

namespace Stripe\Identity;

/**
 * A VerificationReport is the result of an attempt to collect and verify data from
 * a user. The collection of verification checks performed is determined from the
 * `type` and `options` parameters used. You can find the
 * result of each verification check performed in the appropriate sub-resource:
 * `document`, `id_number`, `selfie`.
 *
 * Each VerificationReport contains a copy of any data collected by the user as
 * well as reference IDs which can be used to access collected images through the
 * [FileUpload](https://stripe.com/docs/api/files) API. To configure and
 * create VerificationReports, use the [VerificationSession](https://stripe.com/docs/api/identity/verification_sessions)
 * API.
 *
 * Related guides: [Accessing verification results](https://stripe.com/docs/identity/verification-sessions#results).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $document Result from a document check
 * @property null|\Stripe\StripeObject $id_number Result from an id_number check
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $options
 * @property null|\Stripe\StripeObject $selfie Result from a selfie check
 * @property string $type Type of report.
 * @property null|string $verification_session ID of the VerificationSession that created this report.
 */
class VerificationReport extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'identity.verification_report';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const TYPE_DOCUMENT = 'document';
    const TYPE_ID_NUMBER = 'id_number';
}

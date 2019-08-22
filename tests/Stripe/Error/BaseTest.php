<?php

namespace Stripe;

class BaseTest extends TestCase
{
    public function createFixture()
    {
        return $this->getMockForAbstractClass(\Stripe\Error\Base::class, [
            'message',
            200,
            '{"error": {"code": "some_code"}}',
            ['error' => ['code' => 'some_code']],
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],
        ]);
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        $this->assertSame(200, $e->getHttpStatus());
        $this->assertSame('{"error": {"code": "some_code"}}', $e->getHttpBody());
        $this->assertSame(['error' => ['code' => 'some_code']], $e->getJsonBody());
        $this->assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        $this->assertSame('req_test', $e->getRequestId());
        $this->assertNotNull($e->getError());
        $this->assertSame('some_code', $e->getError()->code);
    }

    public function testToString()
    {
        $e = $this->createFixture();
        $this->assertContains("(Request req_test)", (string)$e);
    }
}

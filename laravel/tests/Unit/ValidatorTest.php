<?php

namespace Tests\Unit;

use App\Code\UserStore;
use App\Code\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    private $validator;

    public function setUp(): void {
        parent::setUp();
        $store = new UserStore();
        $store->addUser('bob williams', 'bob@example.com', '12345');
        $this->validator = new Validator($store);

    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testValidateCorrectPass()
    {
        $this->assertTrue(
            $this->validator->validateUser('bob@example.com', '12345'),
            'Expecting successful validation'
        );
    }

    public function testValidateFalsePass() {
        $store = $this->getMockBuilder(UserStore::class)->getMock();
        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
            ->method('getUser')
            ->with($this->returnValue([
                'name' => 'bob williams',
                'mail' => 'bob@example.com',
                'pass' => 'right'
            ]));
        
        $this->validator->validateUser('bob@example.com', 'wrong');
    }
}

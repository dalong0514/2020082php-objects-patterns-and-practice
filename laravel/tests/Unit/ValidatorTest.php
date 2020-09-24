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
        $stub = $this->createMock(UserStore::class);

        $stub->expects($this->any())
            ->method('getUser')
            ->will($this->returnValue([
                'name' => 'bob williams',
                'mail' => 'bob@example.com',
                'pass' => 'right'
            ]));

        $this->validator = new Validator($stub);
        $this->assertTrue($this->validator->validateUser('bob@example.com', 'right'));
    }

    public function testMockTest() {
        $stub = $this->createMock(Validator::class);
        $stub->method('doSomething')->willReturn('dalong');
        $this->assertEquals('dalong', $stub->doSomething('da'));
    }

}

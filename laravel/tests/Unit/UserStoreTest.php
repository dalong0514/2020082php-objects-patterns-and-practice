<?php
// 18.08-code
namespace Tests\Unit;

use App\Code\UserStore;
use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    protected $store;

    protected function setUp(): void {
        parent::setUp();
        $this->store = new UserStore();
    }
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetUser() {
        $this->store->addUser('bob williams', 'a@b.com', '12345');
        $user = $this->store->getUser('a@b.com');
        $this->assertEquals('a@b.com', $user['mail']);
        $this->assertEquals('bob williams', $user['name']);
        $this->assertEquals('12345', $user['pass']);
    }

    public function testAddUserDuplicate() {
        try {
            $ret = $this->store->addUser('bob williams', 'a@b.com', '12345');
            $ret = $this->store->addUser('bob stevens', 'a@b.com', '12345');
            self::fail('Exception should have been thrown');
        } catch (\Exception $e) {
            $const = $this->logicalAnd(
                $this->logicalNot($this->containsEqual('bob stevens')),
                $this->isType('array')
            );
            // 自定义断言
            self::assertThat($this->store->getUser('a@b.com'), $const);
        }
    }
}

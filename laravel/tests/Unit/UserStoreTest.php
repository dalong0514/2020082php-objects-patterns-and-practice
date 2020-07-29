<?php

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

    public function testAddUserShortPass() {
        try {
            $this->store->addUser('bob williams', 'bob@example.com', 'ff');
        } catch (\Exception $e) {
            return;
        }
        $this->fail('Short password exception expected');
    }
}

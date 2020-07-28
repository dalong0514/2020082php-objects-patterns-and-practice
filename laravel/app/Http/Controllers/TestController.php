<?php

namespace App\Http\Controllers;

use App\Code\UserStore;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        $store = new UserStore();
        $store->addUser(
            'bob williams',
            'bob@example.com',
            '12345'
        );
        $store->notifyPasswordFailure('bob@example.com');
        $user = $store->getUser('bob@example.com');
        dd($user);
        return $user;
    }
}

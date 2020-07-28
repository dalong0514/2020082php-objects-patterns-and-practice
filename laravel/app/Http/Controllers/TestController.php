<?php

namespace App\Http\Controllers;

use App\Code\UserStore;
use App\Code\Validator;
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
        // $store->notifyPasswordFailure('bob@example.com');
        // $user = $store->getUser('bob@example.com');
        $validator = new Validator($store);
        if ($validator->validateUser('bob@example.com', '12345')) {
            print "pass, friend\n";
        } else print "false\n";
    }
}

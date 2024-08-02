<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function test()
    {
        Redis::publish('test-channel', json_encode(['message' => 'Hello from Laravel']));
        return response()->json(['status' => 'Message sent']);
    }
}

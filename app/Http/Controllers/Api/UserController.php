<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $ret = array(
            'code' => 200,
            'msg' => 'ok'
        );

        $user_info = DB::table('user')
                        ->select('id', 'name', 'authority')
                        ->where(['account' => $request->input('account'), 'password' => $request->input('password')])
                        ->get();
        
        $redis_key = 'user:info:' . $user_info[0]->id;
        $redis = app('redis.connection');
        if( !$redis->get($redis_key) ) {
            $redis->set($redis_key, json_encode($user_info, true));
        }

        return $ret;
    }

    /**
     * 創建新用戶
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addUser(Request $request)
    {
        $ret = array(
            'code' => 200,
            'msg' => 'ok'
        );
        
        $redis = app('redis.connection');
        if( !$info = $redis->get($redis_key) || $info['authority'] !== 'MANAGER' ) {
            $ret['code'] = -1;
            $ret['msg'] = '沒有權限';
            return $ret;
        }

        DB::table('users')->insert(
            ['name' => $request->input('name'), 'authority' => $request->input('authority'),
             'account' => $request->input('account'), 'password' => $request->input('password')]
        );

        return $ret;
    }

    public function addList(Request $request)
    {
        $ret = array(
            'code' => 200,
            'msg' => 'ok'
        );
        
        $redis = app('redis.connection');
        if( !$info = $redis->get($redis_key) && $info[''] ) {
            $ret['code'] = -1;
            return $ret;
        }

        DB::table('list')->insert(
            ['email' => 'john@example.com', 'votes' => 0]
        );
    }

    public function getList()
    {
        $list_info = DB::table('list')
                    ->orderBy('level')
                    ->get();

        $data = [
            'list_info' => $list_info
        ];

        return view('home', $data);
    }
}

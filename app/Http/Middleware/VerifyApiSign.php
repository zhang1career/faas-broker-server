<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;


class VerifyApiSign
{
    /**
     * @var string 时间字段
     */
    private const TIME_FIELD = 'timestamp';

    /**
     * @var string 签名字段
     */
    private const SIGN_FIELD = 'sign';


    /**
     * @var array 忽略列表
     */
    protected $exceptList = [
    ];

    /**
     * @var int 时间误差
     */
    protected $timeError = 5;

    /**
     * @var string 密钥
     */
    protected $secretKey = '';



    public function __construct()
    {
        $this->secretKey = config('auth.api_sign.secret_key', '');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->inExceptArray($request) || ($this->allowTimestamp($request) && $this->signMatch($request))) {
            return $next($request);
        }
        return response()
            ->json([
                'code' => '109',
                'msg'  => '签名错误',
                'data' => [],
            ]);
    }

    /**
     * 判断当前请求是否在忽略列表中
     */
    protected function inExceptArray($request)
    {
        foreach ($this->exceptList as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }
        return false;
    }

    /**
     * 判断用户请求是否在对应时间范围
     */
    protected function allowTimestamp($request)
    {
        $queryTime = Carbon::createFromTimestamp($request->query(static::TIME_FIELD, 0));
        $lfTime = Carbon::now()->subSeconds($this->timeError);
        $rfTime = Carbon::now()->addSeconds($this->timeError);
        if ($queryTime->between($lfTime, $rfTime, true)) {
            return true;
        }
        return false;
    }

    /**
     * 签名验证
     */
    protected function signMatch($request)
    {
        $data = $request->query();
        // 移除sign字段
        if (isset($data['sign'])) {
            unset($data['sign']);
        }

        ksort($data);
        $sign = '';
        foreach ($data as $k => $v) {
            if ($this->signField !== $k) {
                $sign .= $k . $v;
            }
        }

        if (strtoupper(sha1(md5($sign . $this->secretKey))) === $request->query(static::SIGN_FIELD, null)) {
            return true;
        }
        return false;
    }
}
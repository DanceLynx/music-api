<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.v1.')
    ->prefix('v1')
    ->namespace('Api')
    ->group(function (){
        Route::middleware('throttle:' . config('api.rate_limits.sign'))
            ->group(function () {
                 // 图片验证码
                Route::post('captchas', 'CaptchasController@store')
                    ->name('captchas.store');

                // 发送手机验证码
                Route::post('verificationCodes', 'VerificationCodesController@store')
                ->name('verificationCodes.store');

                // 用户注册
                Route::post('users', 'UsersController@store')
                    ->name('users.store');

                // 微信登录
                Route::post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')
                    ->where('social_type', 'weixin')
                    ->name('socials.authorizations.store');

                // 登录
                Route::post('authorizations', 'AuthorizationsController@store')
                    ->name('api.authorizations.store');

                // 刷新token
                Route::put('authorizations/current', 'AuthorizationsController@update')
                    ->name('authorizations.update');
                // 删除token
                Route::delete('authorizations/current', 'AuthorizationsController@destroy')
                    ->name('authorizations.destroy');
            });

        Route::middleware('throttle:' . config('api.rate_limits.access'))
            ->group(function () {
                // 获取所有歌手
                Route::get('singers','SingersController@index')
                    ->name('singers.index');
                // 获取所有歌单
                Route::get('covers','CoversController@index')
                    ->name('covers.index');
            });
    });

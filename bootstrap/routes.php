<?php

Route::get(
    '/',
    function () {
        render('index', [
            'msg' => 'hello',
        ]);
    }
);

Route::post(
    '/login',
    function ($request) {
        $data = $request->getParsedBody(); //$_POST

        $account = $data['account'] ?? '';
        $password = $data['password'] ?? '';

        $result = verifyPassengerLogin($account, $password);

        render('index', ['msg' => $result ? 'success' : 'wrong',]);
    }
);

    // $app->get('/', function (Request $request, Response $response, $args) {

    //     render('index', [
    //         'msg' => 'hello',
    //     ]);

    //     return $response;
    // });

    // $app->post('/login', function (Request $request, Response $response, $args) {

    //     $data = $request->getParsedBody(); //$_POST

    //     $account = $data['account'] ?? '';
    //     $password = $data['password'] ?? '';

    //     $result = verifyPassengerLogin($account, $password);
    //     if ($result) {
    //         render('index', ['msg' => 'success',]);
    //     } else {
    //         render('index', ['msg' => 'wrong',]);
    //     }

    //     return $response;
    // });

    // /* =========================================================================
    // * = DRIVER
    // * =========================================================================
    // **/
    // $app->get('/driver', function (Request $request, Response $response, $args) {

    //     echo '<pre>';
    //     var_dump(DB::fetchAll('driver'));

    //     return $response;
    // });

    // $app->get('/driver/{id}', function (Request $request, Response $response, $args) {

    //     $driverId = $args['id'];

    //     //司機駕駛的公車
    //     $bus = DB::find('bus', $driverId, 'driver_id');
    //     $departTime = $bus['DEPART_TIME'];

    //     var_dump(countTimeToArriveNextStop($departTime));

    //     return $response;
    // });

    // /* =========================================================================
    // * = STOP
    // * =========================================================================
    // **/
    // $app->get('/stop', function (Request $request, Response $response, $args) {

    //     render('stop', ['msg' => '增加站牌資訊',]);

    //     return $response;
    // });

    // $app->post('/stop/add', function (Request $request, Response $response, $args) {

    //     $data = $request->getParsedBody();

    //     $result = DB::create('stop', $data);

    //     render('stop', ['msg' => $result ? '增加站牌資訊成功':'增加站牌資訊失敗',]);

    //     return $response;
    // });

    // $app->post('/stop/update', function (Request $request, Response $response, $args) {

    //     $data = $request->getParsedBody();

    //     $stopId = $data['STOP_ID'];

    //     $result = DB::update('stop', "`STOP_ID` = {$stopId}", $data);

    //     render('stop', ['msg' => $result ? '修改站牌資訊成功':'修改站牌資訊失敗',]);

    //     return $response;
    // });

    // Route::get('/test-route',function () {
    //     echo 'just a test';
    //     render('index', ['msg' => '做個測試']);
    // });

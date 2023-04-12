<?php

use App\Http\Controllers\API\V1;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('card/save', V1\Payment\SaveCardController::class)->name('api_add_card');
Route::post('p2p/save', V1\P2P\ResultController::class)->name('api_p2p_result');

Route::prefix('faq')->group(function () {
    Route::get('', [V1\FAQ\IndexController::class, 'index']);
    Route::get('parent', [V1\FAQ\ParentController::class, 'index']);
    Route::get('{parent}', [V1\FAQ\ParentController::class, 'show']);
});

Route::post('bring/store', V1\Bring\BringStoreController::class);
Route::post('feedback/store', V1\Feedback\FeedbackStoreController::class);

require __DIR__ . '/api.v2.php';

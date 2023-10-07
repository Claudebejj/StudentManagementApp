<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $attempt = Auth::attempt($credentials, false, false);
    if ($attempt) {
        $user = auth()->user();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token]);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
});




Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index']);
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/', [StudentController::class, 'store']);
        Route::delete('/{id}', [StudentController::class, 'destroy']);
    });

    Route::get('/{id}', [StudentController::class, 'show']);
});


Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index']);
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/', [CourseController::class, 'store']);
        Route::delete('/{id}', [CourseController::class, 'destroy']);
    });

    Route::get('/{id}', [CourseController::class, 'show']);
});
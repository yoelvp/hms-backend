<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthenticationController extends Controller {
  /**
   * Login of the user who administers the system
   *
   * @param LoginUserRequest $request Request validation of data
   * @return JsonResponse
   */
  public function login(LoginUserRequest $request): JsonResponse {
    $request->validated();
    $user = User::query()->where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('authentication')->plainTextToken;

    if (!$user || !Hash::check($request['password'], $user['password'])) {
      return response()->json([
        'message' => 'The credentials are incorrect. Please try again.',
      ], 401);
    }

    return response()->json([
      'token' => $token,
      'token_type' => 'Bearer'
    ], 200);
  }

  /**
   * Register of a new user
   *
   * @param RegisterUserRequest $request Request recivied
   * @return JsonResponse Returns a JSON structure
   */
  public function register(RegisterUserRequest $request): JsonResponse {
    $user = User::query()->create($request->validated());
    $token = $user->createToken('authentication')->plainTextToken;
    Auth::login($user);

    return response()->json(
      [
        'user' => $user,
        'token' => $token,
        'token_type' => 'Bearer'
      ],
      201
    );
  }

  /**
   * Reset password of the user
   */
  public function resetPassword(Request $request, int $id): JsonResponse {
    $request->validate([
      'password' => 'required|string|min:6'
    ]);
    $userFound = User::query()->where('id', $id)->first();

    if (!$userFound) {
      return response()->json([
        'message' => "User with ID $id not found"
      ], 404);
    }

    $userFound->update([
      'password' => $request['password']
    ]);


    return response()->json([
      'first' => $userFound,
      'message' => 'Password was updated successfully'
    ]);
  }

  /**
   * Sign off
   */
  public function logout(Request $request): JsonResponse {
    $request->user()->tokens()->delete();

    return response()->json([
      'message' => 'The user logged out succesfully'
    ]);
  }
}

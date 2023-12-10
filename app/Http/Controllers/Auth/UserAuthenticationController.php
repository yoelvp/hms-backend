<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use App\Services\Auth\UserAuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserAuthenticationController extends Controller {
  public function __construct(
    private UserAuthenticationService $userService
  ) {
  }

  public function login(LoginUserRequest $request): JsonResponse {
    $user = $this->userService->login($request->validated());
    $token = $user->createToken('authentication')->plainTextToken;

    if (!Auth::attempt($user->only('email', 'password'))) {
      return response()->json([
        'message' => 'The credentials are incorrect. Please try again.',
      ], 401);
    }

    return response()->json([
      'token' => $token,
      'token_type' => 'Bearer'
    ], Response::HTTP_OK);
  }

  public function register(RegisterUserRequest $request): JsonResponse {
    $user = $this->userService->register($request->validated());
    $token = $user->createToken('authentication')->plainTextToken;

    return response()->json(
      [
        'user' => $user,
        'token' => $token,
        'token_type' => 'Bearer'
      ],
      Response::HTTP_CREATED
    );
  }

  public function resetPassword(Request $request, int $id): JsonResponse {
    $request->validate([
      'password' => 'required|string|min:6'
    ]);

    $userFound = User::query()->where('id', $id)->firstOrFail();
    if (!$userFound) {
      return response()->json([
        'message' => "User with ID $id not found"
      ], Response::HTTP_NOT_FOUND);
    }

    $userFound->update([
      'password' => $request['password']
    ]);


    return response()->json([
      'user' => $userFound,
      'message' => 'Password was updated successfully'
    ]);
  }
}

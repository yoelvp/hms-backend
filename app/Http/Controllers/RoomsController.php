<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomsController extends Controller {
  /**
   * Get all rooms with pagination
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function getAll(Request $request): JsonResponse {
    $perPage = $request->input('perPage');
    $page = $request->input('page');
    $users = User::query()->paginate(perPage: $perPage, page: $page);
    dd($users);

    return response()->json($users, 200);
  }

  public function register(): JsonResponse {
    return response()->json([
      'room' => [
        'id' => 1,
        'name' => 'Room name'
      ],
      'message' => 'The room create successfully.'
    ], 200);
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomsController extends Controller {
  public function getAll(Request $request): JsonResponse {
    $perPage = $request->input('perPage');
    $page = $request->input('page');
    $users = User::query()->paginate(perPage: $perPage, page: $page);

    return response()->json($users, Response::HTTP_OK);
  }
}

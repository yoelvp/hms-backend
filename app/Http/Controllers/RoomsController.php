<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRoomRequest;
use App\Models\Room;
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
    $rooms = Room::query()->paginate(perPage: $perPage, page: $page);

    return response()->json($rooms, 200);
  }

  /**
   * Register a new Room
   *
   * @param RegisterRoomRequest $request
   * @return JsonResponse
   */
  public function register(RegisterRoomRequest $request): JsonResponse {
    $request->validated();

    $room = Room::query()->create($request->all());

    return response()->json([
      'room' => $room,
      'message' => 'The room create successfully.'
    ], 200);
  }

  /**
   * Register 2 or more rooms
   *
   * @param RegisterRoomRequest $request
   * @return JsonResponse
   */
  public function registerMany(Request $request): JsonResponse {
    $request->validate([
      '*.room_number' => 'required|string',
      '*.loor_number' => 'required|string',
      '*.number_beds' => 'required|string',
      '*.bathroom_included' => 'required|bool',
      '*.hot_water' => 'required|bool',
      '*.tv_included' => 'required|bool',
      '*.availability' => 'required|bool',
      '*.type_room' => 'required|string',
      '*.price_per_day' => 'required|numeric',
      '*.price_per_hour' => 'required|numeric',
    ]);

    $rooms = Room::insert($request->all());

    return response()->json([
      'room' => $request->all(),
      'created' => $rooms,
      'message' => 'The room create successfully.'
    ], 200);
  }
}

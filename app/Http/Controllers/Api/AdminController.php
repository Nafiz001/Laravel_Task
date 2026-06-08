<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Return the admin dashboard data.
     *
     * Access is restricted to authenticated users with the "admin" role
     * (enforced by the auth:sanctum and role:admin middleware on the route).
     */
    public function dashboard(Request $request): JsonResponse
    {
        $user = $request->user();

        return response()->json([
            'message' => 'Welcome to the admin dashboard.',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->getRoleNames(),
            ],
        ]);
    }
}

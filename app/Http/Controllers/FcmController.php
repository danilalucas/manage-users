<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FcmService;

class FcmController extends Controller
{
    private $fcmService;

    public function __construct(FcmService $fcmService)
    {
        $this->fcmService = $fcmService;
    }

    public function register(Request $request)
    {
        try{
            $token = $request->token;
            $this->fcmService->register($token);

            return response()->json(['message' => __('Token registered successfully')]);
        } catch (\Exception $e) {
            return response()->json(['error' => __('An internal server error occurred')], 500);
        }
    }
}

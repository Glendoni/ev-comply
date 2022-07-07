<?php

namespace App\Http\Controllers;

use App\Events\NewEntryReceivedEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request = $request->all();

        $validator = Validator::make($request, [
            'email' => 'required|email|max:200'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $usercontent = ['email' => $request['email']];
        NewEntryReceivedEvent::dispatch($usercontent);

        return response()->json(['success' => 'Thanks for signing up!'], 200);
    }
}

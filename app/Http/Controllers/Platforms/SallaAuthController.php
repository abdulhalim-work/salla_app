<?php

namespace App\Http\Controllers\Platforms;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SallaAuthController extends Controller
{
    public function auth()
    {
        $data = [
            'client_id' => config('salla.CLIENT_ID'),
            'client_secret' => config('salla.CLIENT_SECRET'),
            'response_type' => 'code',
            'redirect_url' => config('salla.CALLBACK_URL'),
            'scope' => 'offline_access',
            'state' => rand(11111110, 99999999)
        ];

        $query = http_build_query($data);

        return redirect(config('salla.AUTH_URL') . '?' . $query);
    }

    public function callback(Request $request)
    {
        $data = [
            'client_id' => config('salla.CLIENT_ID'),
            'client_secret' => config('salla.CLIENT_SECRET'),
            'grant_type' => 'authorization_code',
            'code' => $request->code,
            'scope' => 'offline_access',
            'redirect_url' => config('salla.CALLBACK_URL'),
            'state' => $request->state
        ];

        $response = Http::asForm()->post(config('salla.TOKEN_URL'), $data);
        $json_response = json_decode($response->body());

        if ($response->successful()) {
            $store_info_response = Http::withToken($json_response->access_token)->get(config('salla.API_URL') . '/store/info');

            if (!$store_info_response->successful())
                abort(500);

            $store_info = json_decode($store_info_response->body());

            $store = Store::query()->create([
                'access_token' => $json_response->access_token,
                'access_token_expire_at' => Carbon::now()->addSeconds($json_response->expires_in),
                'refresh_token' => $json_response->refresh_token,
                'name' => $store_info->data->name,
                'description' => $store_info->data->description,
                'avatar' => $store_info->data->avatar,
                'email' => $store_info->data->email,
            ]);

            Auth::user()->update(['store_id' => $store->id]);

            return redirect()->route('dashboard.store.index');
        }
    }
}

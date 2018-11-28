<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Instagram;

class SocialAuthenticationController extends Controller
{
    //

    public function instagram(Request $request)
    {
    	$authUrl = Instagram::authorize([], function ($url, $provider) use ($request) {
		    $request->session()->put('instagramState', $provider->getState());
		    return $url;
		});

		return redirect()->away($authUrl);
    }

    public function login_instagram(Request $request)
    {
    	if (!$request->has('state') || $request->state !== $request->session()->get('instagramState')) {
		    abort(400, 'Invalid state');
		}

		if (!$request->has('code')) {
		    abort(400, 'Authorization code not available');
		}

		$token = Instagram::getAccessToken('authorization_code', [
		    'code' => $request->code,
		    'scope' => 'basic+public_content+comments+relationships+likes+follower_list',
		]);

		$request->session()->put('instagramToken', $token);

    }
}

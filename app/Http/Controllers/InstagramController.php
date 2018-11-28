<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Instagram;

class InstagramController extends Controller
{
    //
    public function fetch_all(Request $request)
    {
    	$instagramToken = $request->session()->get('instagramToken');

		$instagramUser = Instagram::getResourceOwner($instagramToken);
		//dd($instagramUser);
		$name = $instagramUser->getName();
		$bio = $instagramUser->getDescription();

		$feedRequest = Instagram::getAuthenticatedRequest(
		    'GET',
		    'https://api.instagram.com/v1/users/self/media/recent',
		    $instagramToken
		);
		//dd($feedRequest);
		$client = new \GuzzleHttp\Client();
		$feedResponse = $client->send($feedRequest);
		//dd($feedResponse);
		$instagramFeed = json_decode($feedResponse->getBody()->getContents());
		dd($instagramFeed);
		
    }
}

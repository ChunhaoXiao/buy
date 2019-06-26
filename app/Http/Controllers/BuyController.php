<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Http\Requests\BuyRequest;
use GuzzleHttp\Client;
use Hash;

class BuyController extends Controller
{
	public function create()
	{
		return view('buy');
	}

    public function store(BuyRequest $request)
    {
    	try{
        	$datas = $request->only(['username', 'card_number']);
        	$card = Card::whereCardNumber($datas['card_number'])->first();
        	$http = config('http');
        	$datas['month'] = $card['month'];
        	$datas['key'] = Hash::make($http['key']);
        	$client = new Client();
        	$result = $client->post($http['url'], [
        		'form_params' => $datas,
        	]);
        	$res = json_decode($result->getBody()->getContents(), true);

        	if(!$res['status'])
        	{
        		return redirect('member')->withErrors($res)->withInput();
        	}

        	Card::where('card_number', $datas['card_number'])->update(['used' => 1,'user' => $datas['username']]);
        	return redirect('member')->with('success', 1);

        } catch(\Exception $e){
            return redirect('member')->withErrors(['msg' => '服务器错误，请稍后再试']);
        }

    }	
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Storage;
class DownloadController extends Controller
{
    public function index(Request $request)
    {
    	
    	$month = $request->month;
    	
    	$datas = Card::where('month', $month)->valid()->get();
    	$str = '';
    	if($datas->isNotEmpty())
    	{
    		foreach($datas as $v)
    		{
    			$str .= $v->card_number.PHP_EOL;
    		}
    		$file_name = time().'.txt';
    	    Storage::put($file_name, $str);
    	    return Storage::download($file_name);
    	}
    	return back();
    	//return response()->json('没有数据');
    	
    }
}

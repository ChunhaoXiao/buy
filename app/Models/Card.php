<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	public static $months = [
		1 => '一个月',
		3 => '三个月',
		6 => '半年',
		12 => '一年',
	];
    protected $fillable = [
    	'card_number',
    	'month',
    	'used',
    ];


    public function scopeFilter($query, $data)
    {
    	$data = array_filter($data, 'strlen');
    	if(!empty($data))
    	{
    		foreach($data as $k => $v)
    		{
    			if(in_array($k, ['month', 'used', 'card_number']))
    			{
    				$query->where($k, $v);
    			}
    		}
    	}
    	return $query;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $primaryKey = 'ID_VENDA';
	
	protected $fillable = [
		'ID_VENDA',
        'NUMERO_VENDA', 
		'VENDEDOR_RESPONSAVEL',
		'PRODUTO_ID',
		'DATA_VENDA'
    ];
}

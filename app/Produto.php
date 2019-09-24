<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{	
	protected $primaryKey = 'ID_PRODUTO';
	
    protected $fillable = [
		'ID_PRODUTO',
        'NOME', 
		'PRECO',
		'DATA_CRIACAO',
		'DATA_ALTERACAO'
    ];
}

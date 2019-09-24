<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $primaryKey = 'ID_USUARIO';
	
	protected $fillable = [
		'ID_USUARIO',
        'NOME', 
		'SENHA',
		'CEP',
		'RUA',
		'DATA_CRIACAO'
    ];
}

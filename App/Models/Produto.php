<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class Produto extends Model
{
	
	//Definir os campos que podem ser preenchidos 
	protected $fillable = [
		'titulo', 'descricao', 'preco', 
		'fabricante', 'updated_at', 'created_at'
	];

}
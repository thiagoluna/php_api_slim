<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
use App\Models\Usuario;
//usar a biblioteca do firebase
use \Firebase\JWT\JWT;


// Rotas para geração de token
$app->post('/api/token', function($request, $response){

	$dados = $request->getParsedBody();

	$email = $dados['email'] ?? null;
	$senha = $dados['senha'] ?? null;

	//First para pegar o primeiro resultado
	$usuario = Usuario::where('email', $email)->first();

	if( !is_null($usuario) && ($senha === $usuario->senha ) ){

		//pegar chave secreta de dentro do settings.php
		$secretKey   = $this->get('settings')['secretKey'];
		//usando a biblioteca JWT do firebase
		//passar os dados do objeto usuario para gerar chave
		$chaveAcesso = JWT::encode($usuario, $secretKey);

		return $response->withJson([
			'chave' => $chaveAcesso
		]);

	}

	return $response->withJson([
		'status' => 'erro'
	]);

});

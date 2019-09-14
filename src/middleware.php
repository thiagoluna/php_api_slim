<?php
// Verificações middleware
//envia o cabeçalho pra cada requisicao

// e.g: $app->add(new \Slim\Csrf\Guard);
//biblioteca authentication JWT pra fazer autenticacao

$app->add(new Tuupola\Middleware\JwtAuthentication([
    "regexp" => "/(.*)/",
    "path" => "/api", 
    //rota ignorada pra autenticacao
    "ignore" => ["/api/token"],
    //pegando chave que estoa no settings.php
    "secret" => $container->get('settings')['secretKey']
]));

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response            
            ->withHeader('Access-Control-Allow-Origin', '*')//sites que tem permissão pra usar a api
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')//cabeçalhos padroes
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');//metodos que podem ser utilizados
});

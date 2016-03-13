<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ClienteService;

$response = new Response;
$app['clienteService'] = function(){

	$clienteEntity = new Cliente;
	$clienteMapper = new ClienteMapper;

	return new ClienteService($clienteEntity, $clienteMapper);
};

$app->get('/api/clientes', function() use ($app) {

	$dados = $app['clienteService']->fetchAll();

	return $app->json( $dados );

});

$app->get('/', function() use ($app) {
	
	return $app['twig']->render('index.twig', []);
})->bind('index');

$app->get('/clientes', function() use ($app) {

	$dados = $app['clienteService']->fetchAll();

	return $app['twig']->render('clientes.twig', ['clientes' => $dados] );
})->bind('clientes');

$app->get('/cliente', function () use ($app) {

	$dados['nome'] = 'Tiago';
	$dados['email'] = 'tiago.farias.poa@gmail.com';

	
	#$result = $clienteService->insert( $dados );
	$result = $app['clienteService']->insert( $dados );

	return $app->json( $result );
});

$app->run();

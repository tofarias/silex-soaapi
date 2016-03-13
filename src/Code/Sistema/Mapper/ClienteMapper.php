<?php namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{
	public function insert(Cliente $cliente)
	{
		$dados = Array();
		$dados['nome'] = $cliente->getNome();
		$dados['email'] = $cliente->getEmail();

		return $dados;
	}

	public function fetchAll()
	{
		$dados[0]['nome'] = 'Tiaago';
		$dados[0]['email'] = 't@123';

		$dados[1]['nome'] = 'Farias';
		$dados[1]['email'] = 'fa@123';

		return $dados;
	}
}
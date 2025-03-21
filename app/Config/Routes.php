<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Principal::home');

//usuario//
$routes->get('usuario/login', 'Usuario::login');
$routes->post('usuario/autenticar', 'Usuario::autenticar');
$routes->get('usuario/logout', 'Usuario::logout');

$routes->get('usuario/cadastrar', 'Usuario::cadastrar');
$routes->POST('usuario/inserir', 'Usuario::inserir');

$routes->get('usuario/listar_usuario', 'Usuario::listar_usuario');
$routes->post('usuario/atualizar', 'Usuario::atualizar');
$routes->post('usuario/atualizar_endereco', 'Usuario::atualizar_endereco');
//usuario//

//principal//
$routes->get('principal/home', 'Principal::home');
//principal//

//agendamentos//
$routes->get('agendamentos/listar_agendamentos', 'Agendamentos::listar_agendamentos');
$routes->post('agendamentos/listar_agendamentos', 'agendamentos::filtrar_agendamentos');
$routes->get('agendamentos/imprimir_agendamento/(:num)', 'Agendamentos::imprimir_agendamento/$1');
$routes->post('agendamentos/atualizar', 'Agendamentos::atualizar');
$routes->post('agendamentos/cancelar', 'Agendamentos::cancelar');
$routes->post('agendamentos/chat', 'Agendamentos::chat');

//agendamentos//

//agendamentos//
$routes->get('locais/listar_locais', 'Locais::listar_locais');
$routes->post('locais/inserir', 'Locais::inserir');
$routes->post('locais/atualizar', 'Locais::atualizar');
$routes->post('locais/deletar', 'Locais::deletar');
//agendamentos//

//agendamentos//
$routes->get('informativos/listar_informativos', 'Informativos::listar_informativos');
//agendamentos//

//agendamentos//
$routes->get('relatorios/listar_relatorio', 'Relatorios::listar_relatorio');
//agendamentos//

//informacoes//
$routes->get('informacoes/quemsomos', 'Informacoes::quemsomos');
$routes->get('informacoes/informacoes_sistema', 'Informacoes::informacoes_sistema');
$routes->get('informacoes/objetivo_clinica', 'Informacoes::objetivo_clinica');
//informacoes//


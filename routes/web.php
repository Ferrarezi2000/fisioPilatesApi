<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Login
$router->post('/login', 'LoginController@logar');

//Aministrador
$router->post('/adm', 'AdministradorController@cadastrar');
$router->put('/adm/{id}', 'AdministradorController@editar');
$router->get('/adm/{id}', 'AdministradorController@buscar');
$router->delete('/adm/{id}', 'AdministradorController@deletar');

//Aluno
$router->post('/aluno', 'AlunoController@cadastrar');
$router->put('/aluno/{id}', 'AlunoController@editar');
$router->get('/aluno/{id}', 'AlunoController@buscar');
$router->get('/alunos', 'AlunoController@listar');
$router->delete('/aluno/{id}', 'AlunoController@deletar');

//Professor
$router->post('/professor', 'ProfessorController@cadastrar');
$router->put('/professor/{id}', 'ProfessorController@editar');
$router->get('/professor/{id}', 'ProfessorController@buscar');
$router->get('/professores', 'ProfessorController@listar');
$router->delete('/professor/{id}', 'ProfessorController@deletar');

//Agenda
$router->post('/agenda', 'AgendaController@cadastrar');
$router->get('/agenda', 'AgendaController@listar');
$router->put('/agenda/{id}', 'AgendaController@editar');
$router->get('/agenda/{id}', 'AgendaController@buscar');
$router->delete('/agenda/{id}', 'AgendaController@deletar');
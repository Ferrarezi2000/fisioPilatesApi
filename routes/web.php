<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Login
$router->post('/login', 'LoginController@logar');

//Cadastro Inicial
$router->post('/auto', 'CadastroInicialController@cadastrar');

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
$router->post('/agenda/professor', 'AgendaController@listar');
$router->put('/agenda/{id}', 'AgendaController@editar');
$router->get('/agenda/{id}', 'AgendaController@buscar');
$router->get('/agenda/livre', 'AgendaController@listaLivre');
$router->post('/agenda/deletar', 'AgendaController@deletar');

//Horario
$router->post('/horario', 'HorarioController@cadastrar');
$router->get('/horario', 'HorarioController@listar');
$router->put('/horario/{id}', 'HorarioController@editar');
$router->get('/horario/{id}', 'HorarioController@buscar');
$router->delete('/horario/{id}', 'HorarioController@deletar');

//Semana
$router->post('/semana', 'SemanaController@cadastrar');
$router->get('/semana', 'SemanaController@listar');
$router->put('/semana/{id}', 'SemanaController@editar');
$router->get('/semana/{id}', 'SemanaController@buscar');
$router->delete('/semana/{id}', 'SemanaController@deletar');
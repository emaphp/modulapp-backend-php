<?php
include 'vendor/autoload.php';

$pdo = new \PDO('sqlite:/db/modulapp.db');
$fluentpdo = new \FluentPDO($pdo);
$app = new \Slim\Slim();

/**
 * NOTES
 */

$app->get('/notes', function() use ($app, $fluentpdo) {
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('notes')));
});

$app->get('/notes/:id', function ($id) use ($app, $fluentpdo) {
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('notes')->where('id', $id)));
});

$app->post('/notes', function() use ($app, $fluentpdo) {
	$note = json_decode($app->request->getBody());
	$id = $fluentpdo->insertInto('notes')->values($note);
	
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('notes')->where('id', $id)));
});

$app->put('/notes/:id', function($id) use ($app, $fluentpdo) {
	$note = json_decode($app->request->getBody());
	$fluentpdo->update('notes')->set($note)->where('id', $id);
	
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('notes')->where('id', $id)));
});

$app->delete('/books/:id', function ($id) use ($app, $fluentpdo) {
	$fluentpdo->deleteFrom('notes')->where('id', $id);
	$app->response()->status(204); //avoid error handler call
});

/**
 * CONTACTS
 */
 
 $app->get('/contacts', function() use ($app, $fluentpdo) {
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('contacts')));
});

$app->get('/contacts/:id', function ($id) use ($app, $fluentpdo) {
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('contacts')->where('id', $id)));
});

$app->post('/contacts', function() use ($app, $fluentpdo) {
	$contact = json_decode($app->request->getBody());
	$id = $fluentpdo->insertInto('contacts')->values($contact);
	
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('contacts')->where('id', $id)));
});

$app->put('/contacts/:id', function($id) use ($app, $fluentpdo) {
	$contact = json_decode($app->request->getBody());
	$fluentpdo->update('contacts')->set($contact)->where('id', $id);
	
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($fluentpdo->from('contacts')->where('id', $id)));
});

$app->delete('/contacts/:id', function ($id) use ($app, $fluentpdo) {
	$fluentpdo->deleteFrom('contacts')->where('id', $id);
	$app->response()->status(204); //avoid error handler call
});

$app->run();

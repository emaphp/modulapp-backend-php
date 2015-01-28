<?php
include 'vendor/autoload.php';

use eMapper\Mapper;
use eMapper\Engine\SQLite\SQLiteDriver;
use eMapper\Query\Attr;

$mapper = new Mapper(new SQLiteDriver('db/modulapp.db'));
$notes = $mapper->newManager('Demo\Note');
$contacts = $mapper->newManager('Demo\Contact');
$app = new \Slim\Slim();

/**
 * NOTES
 */

//GET /notes
$app->get('/notes', function() use ($app, $notes) {
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($notes->find()));
});

//GET /notes/{ID}
$app->get('/notes/:id', function ($id) use ($app, $notes) {
	$note = $notes->findByPk($id);
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($note));
});

//POST /notes
$app->post('/notes', function() use ($app, $notes) {
	$note = json_decode($app->request->getBody());
	$notes->save($note);
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($note));
});

//PUT /notes/{ID}
$app->put('/notes/:id', function($id) use ($app, $notes) {
	$note = json_decode($app->request->getBody());
	$notes->save($note);
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($note));
});

//DELETE /notes/{ID}
$app->delete('/notes/:id', function ($id) use ($app, $notes) {
	$notes->deleteWhere(Attr::id()->eq($id));
	$app->response()->status(204); //avoid error handler call
});

/**
 * CONTACTS
 */
 
 //GET /contacts
$app->get('/contacts', function() use ($app, $contacts) {
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($contacts->find()));
});

//GET /contacts/{ID}
$app->get('/contacts/:id', function ($id) use ($app, $contacts) {
	$contact = $contacts->findByPk($id);
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($contact));
});

//POST /contacts
$app->post('/contacts', function() use ($app, $contacts) {
	$contact = json_decode($app->request->getBody());
	$contacts->save($contact);
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($contact));
});

//PUT /contacts/{ID}
$app->put('/contacts/:id', function($id) use ($app, $contacts) {
	$contact = json_decode($app->request->getBody());
	$contacts->save($contact);
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->write(json_encode($contact));
});

//DELETE /contacts/{ID}
$app->delete('/contacts/:id', function ($id) use ($app, $contacts) {
	$contacts->deleteWhere(Attr::id()->eq($id));
	$app->response()->status(204); //avoid error handler call
});

$app->run();

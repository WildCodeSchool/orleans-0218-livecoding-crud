<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 23/03/18
 * Time: 17:05
 */

function checkError(array $input) :array
{
    $errors = [];

    if (empty($input['title'])) {
        $errors[] = 'Le champ title ne doit pas etre vide';
    }

    if (empty($input['message'])) {
        $errors[] = 'Le champ message ne doit pas etre vide';
    }

    if (empty($input['author'])) {
        $errors[] = 'Le champ author ne doit pas etre vide';
    }

    return $errors;
}
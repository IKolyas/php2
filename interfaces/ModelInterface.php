<?php


namespace app\interfaces;


interface ModelInterface
{
    function getAll();

    function getById(int $id);

    function add(array $params);

    function update(int $id, array $params);

//    function update(string $params);
//
//    function delete(int $id);
}
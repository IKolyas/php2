<?php


namespace app\interfaces;


interface ModelInterface
{
    function getAll();

    function getById(int $id);

    function add(array $params);

    function update(array $params);

//    function delete(int $id);
}
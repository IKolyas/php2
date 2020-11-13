<?php


namespace models;


interface ModelInterface
{
    function getAll() ;

    function getById(int $id) ;

}
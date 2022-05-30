<?php


namespace app\base;


class ComponentsFactory
{
    public function createComponent($name, $params = [])
    {

        $class = $params['class'];
        if (class_exists($class)) {
            unset($params['class']);
            $reflection = new \ReflectionClass($class);

            return $reflection->newInstanceArgs(array_values($params));
        }
        throw new \Exception("Не найден класс компонента");
    }
}
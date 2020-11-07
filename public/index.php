<?php
include 'Product.php';
include 'Model.php';

$product1 = new Product(1, 'Phone', 'Nokia', 22000);
$product1->renderProduct();

$newProduct = new Model(2, 'Notebook', 'HP', 44000, 'black', 'SQ4344-mG');
$newProduct->renderProduct();


//  5. Меняется значение статического свойства в самом классе а не в экземпляре(объекте) класса.
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo(); //1
//$a2->foo(); //2
//$a1->foo(); //3
//$a2->foo(); //4


//6. Класс B наследует от А статические свойства(становится зависим от значений свойств А)
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A();
//$b1 = new B();
//$a1->foo(); //1
//$b1->foo(); //1
//$a1->foo(); //2
//$b1->foo(); //2


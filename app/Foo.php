<?php
namespace App;

class Foo {
    public $variable = 'Test';
    protected $number;
    protected $array = array(902,32,7,1000,509);
    public function __construct($fname, $lname){
        echo $fname . ' ' . $lname;
    }
    public function addnumber($num){
        return $this->number + $num;
    }
    public function setnumber($num){
        $this->number = $num;
    }
    public $arr = array(
        'id'        => 101,
        'name'      => 'Foobar Dolor',
        'age'       => 12,
        'content'   => array(
            'itemid'    =>  209,
            'itemname'  => 'Chocobar',
            'quantity'  => 2
        ),
        'paid'      => true
    );
    public function lol(){
        return 'lol';
    }
    public function getminimum(){
        echo '<br/>';
        sort($this->array);
        var_dump($this->array);
    }
}
class Bar{
    private $count = 0;
    const name = "Lorem Dolor";
    static function testStatic(){
        return 'Static';
    }
}
<?php
/* Stack機能を持つ pushとpopができる
 * @author         kyohei hamada
 * @created_date   2011年 10月 11日 火曜日
 * @updated date   2011年 10月 12日 水曜日
 */
class Stack
{
    public $values = array();
    public $top = -1;  // 先頭の添え字

    public function push($val)
    {
        $this->top++;
        $this->values[$this->top] = $val;
    }

    public function pop()
    {
        if (empty($this->values)) {
            //todo array_pop()を使うとどうなる？か見てみる
            return null;
        }
        $val = $this->values[$this->top];
        unset($this->values[$this->top]);
        $this->top--;
        return $val;
    }

    public function getValues()
    {
        return $this->values;
    }
}

echo 'case1' . "\n";
$s = new Stack();
var_dump($s->pop()); // ''
var_dump($s->getValues()); // 空

echo 'case2' . "\n";
$s->push('hoge');
$s->push('fuga');
$s->push('piyo');
var_dump($s->getValues()); //3要素

echo 'case3' . "\n";
var_dump($s->pop()); // 'piyo'
var_dump($s->getValues());

echo 'case4' . "\n";
$s->push('hamada');
var_dump($s->getValues()); //3要素

echo 'case5' . "\n";
$s->push('haraguchi');
var_dump($s->getValues()); //4要素

echo 'case6' . "\n";
var_dump($s->pop()); // 'haraguchi'
var_dump($s->getValues()); //3要素

var_dump($s->pop()); // 'piyo'
var_dump($s->pop()); // 'fuga'
var_dump($s->pop()); // 'hoge'
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
var_dump($s->pop()); // NULL
$s->push('kantoku');
var_dump($s->getValues()); //1要素

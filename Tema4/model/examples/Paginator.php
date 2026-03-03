<?php

class Paginator{

    protected int $lines;
    protected string $filepath;
    protected int $position;
    protected array $data;

    public function __construct($filepath, $lines){

        $this->lines = $lines;
        $this->filepath = $filepath;
        $this->position = 0;
        $this->prepareData();
    }

    public function setLines($lines):void{
        $this->lines = $lines;
    }

    public function getLines():int{
        return $this->lines;
    }

    public function getData():array{
        $res = [];
        for($i=0; $i<$this->lines;$i++){

            $res[] = $this->data[$this->position % count($this->data)];
            $this->position++;
        }
        return $res;

    }

    private function prepareData():void{
        $file = fopen($this->filepath, "r");
        while (($line = fgets($file)) !== false) {
                $this->data[] = $line;
        }
    }

}


<?php
class Nhomsp
{
    private $manhom;
    private $tennhom;

    public function getmanhom()
    {
        return $this->manhom;
    }
    public function gettennhom()
    {
        return $this->tennhom;
    }

    public function __construct($manhom, $tennhom)
    {
        $this->manhom = $manhom;
        $this->tennhom = $tennhom;
    }
}

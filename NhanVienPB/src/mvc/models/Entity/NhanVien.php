<?php
class NhanVien
{
    public $IDNV;
    public $HoTen;
    public $IDPB;
    public $DiaChi;

    public function __construct($IDNV, $HoTen, $IDPB, $DiaChi)
    {
        $this->IDNV = $IDNV;
        $this->HoTen = $HoTen;
        $this->IDPB = $IDPB;
        $this->DiaChi = $DiaChi;
    }
}
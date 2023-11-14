<?php
class PhongBan
{
    public $IDPB;
    public $TenPB;
    public $MoTa;
    
    public function __construct($IDPB, $TenPB, $MoTa)
    {
        $this->IDPB = $IDPB;
        $this->TenPB = $TenPB;
        $this->MoTa = $MoTa;
    }
}
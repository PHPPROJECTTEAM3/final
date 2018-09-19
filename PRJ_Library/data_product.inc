<?php

class product_amount
{
   public $proID,$proName,$proPrice,$proImg,$proAmount,$proBrand;
   
   public function setValue($ID,$Name,$Img,$brand,$price,$Amount)
   {
       $this->proID=$ID;
       $this->proName=$Name;
       $this->proImg=$Img;
       $this->proBrand=$brand;
       $this->proPrice=$price;
       $this->proAmount=$Amount;
   }
   
   public  function printID()
   {
        echo"$this->proID";
   }
   public  function printName()
   {
        echo $this->proName;
   }

   public  function printPrice()
   {
        echo"$this->proPrice";
   }
public  function printQuantity()
   {
        echo"$this->proAmount";
   }
public  function printBrand()
   {
        echo"$this->proBrand";
   }
public  function printImg()
   {
        echo"../Images/$this->proBrand/$this->proImg";
   }

public function printTotal()
{
    echo ($this->proPrice*$this->proAmount);
}
   
  
   
   
  
}

<?php 
class Products extends Db{
    function all(){
        return $this->select("select * from shoe");
    }
    function featured(){
        return $this->select("select * from shoe where roles=1");
    }
    function product_new(){
        return $this->select("select * from shoe where roles=2");
    }
    function product_nike(){
        return $this->select("select * from shoe where category='nike'");
    }
    function product_adidas(){
        return $this->select("select * from shoe where category='Adidas'");
    }
    function product_mlb(){
        return $this->select("select * from shoe where category='MLB'");
    }
    function product_vans(){
        return $this->select("select * from shoe where category='vans'");
    }
    function product_puma(){
        return $this->select("select * from shoe where category='Puma'");
    }
    function productType($key){
        return $this->select("select * from product where product_type=?", [$key]);
    }
    function search($keySearch){
        //echo "keysearch = ",$keySearch;exit;
        return $this->select("select * from shoe where category like ?", ["%$keySearch%"]);
      }
    function getById($id){
        return $this->select("select * from product where id=? ", [$id]);
    }
    function delete($id){
        return $this->updateTable("delete from product where id=?", [$id]);
    }

}
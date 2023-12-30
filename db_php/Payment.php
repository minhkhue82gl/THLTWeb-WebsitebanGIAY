<?php 
class Payment extends Db{
    function all($user_id){
        return $this->select("select * from `order` where user_id = $user_id");
    }
    function tenKH(){
        return $this->select("SELECT ten FROM `payment` JOIN users ON payment.user_id=users.id");
    }
    function giaSP(){
        return $this->select("SELECT DISTINCT `price` 
                                FROM `shoe` JOIN `order` on `shoe`.`img_name` = `order`.`img_name`");
    }
    function delete($id){
        return $this->updateTable("delete from `order` where id=?", [$id]);
    }
    function deleteAll($id){
        return $this->updateTable("delete from `order` where user_id=?", [$id]);
    }


}
?>
<?php

require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";

class PanierModel extends CI_Model{

    public function addPanier($fruits, $tab){
		if (is_array($fruits)){
			$this->session->set_userdata($tab,$fruits);
		}
	}

	public function getPanier(){
		$fruits = array();
		foreach ($this->session->panier as $fruit){
			$new = $this->FruitModel->findById($fruit->id_fruits);
			array_push($fruits,$new);
		}
		return $fruits;
	}
    
}
/*
if ($quantity != 0) {
			$temp = $this->session->$tab;
			$test = true;
			foreach ($temp as $prod){
				if ($prod->fruit->getId_fruit() == $fruit->getId_fruit()){
					$prod->quantity = $quantity;
					$test = false;
				    if ($prod->quantity == 0){
						$index = array_search($prod,$temp);
						unset($temp[$index]);
					}
				}
			}
			if($test){
				$produit = new ProduitEntity($fruit,$quantity);
				$tmp = array($produit);
				if ($temp == null){
					$temp = $tmp;
				}else{
					$temp = array_merge($temp,$tmp);
				}
			}
			$this->session->set_userdata($tab,$temp);
			$res = ["size" => count($this->session->$tab),"panier" => $this->session->$tab,"fauxPanier" => $this->session->fauxPanier];
			return json_encode($res);
		}
*/ 
?>



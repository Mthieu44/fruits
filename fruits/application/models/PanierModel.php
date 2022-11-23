<?php

require_once APPPATH.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR."ProduitEntity.php";

class PanierModel extends CI_Model{

    public function addPanier($id,$quantity,$tab){
		if ($quantity != 0) {
			$temp = $this->session->$tab;
			$test = true;
			foreach ($temp as $prod){
				if ($prod->id_fruits == $id){
					$prod->quantity = $quantity;
					$test = false;
				    if ($prod->quantity == 0){
						$index = array_search($prod,$temp);
						unset($temp[$index]);
					}
				}
			}
			if($test){
				$produit = new ProduitEntity($id,$quantity);
				$tmp = array($produit);
				if ($temp == null){
					$temp = $tmp;
				}else{
					$temp = array_merge($temp,$tmp);
				}
			}
			$this->session->set_userdata($tab,$temp);
			$res = ["size" => count($this->session->$tab),"panier" => $this->session->$tab];
			return json_encode($res);
		}
	}
    
}

?>
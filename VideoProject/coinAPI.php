<?php 
require_once('block_io.php');
include 'keys.php';
		
class coinAPI {
	
	private $coin;
	
	public function __construct($coin){
		$this->coin = $coin;
	}
	
	public function get_rate(){
		global $block_io_btc;
		global $block_io_ltc;
		global $block_io_dog;
				
		$coin_type;
		
		switch($this->coin){
		case 'dog':
		$price = $block_io_dog->get_current_price(array('price_bas' => 'USD'));
		$fprice = $price->data->prices;
		$coin_type = $fprice;
		break;
		
		case 'ltc':
		$price = $block_io_ltc->get_current_price(array('price_bas' => 'USD'));
		$fprice = $price->data->prices;
		$coin_type = $fprice;
		break;
		
		case 'btc' :
		$price = $block_io_btc->get_current_price(array('price_bas' => 'USD'));
		$fprice = $price->data->prices;
		$coin_type = $fprice;
		break;
		}
		
		return $coin_type[0]->price;
	}
	
}
	
?>
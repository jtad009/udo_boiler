<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Utils component
 */
class StatsComponent extends Component
{

	public function itemIncomeImpact(){
		$connection = ConnectionManager::get('default');
		$data = $connection->execute("SELECT name, count(item_id) as dataSet FROM `sales` INNER JOIN `items` ON items.id = item_id where sales.company_id = ? GROUP BY name HAVING count(item_id) > 0 ORDER BY `dataSet` DESC LIMIT 10",[$_SESSION['Auth']['User']['company_id']])->fetchAll('assoc');
		// $connection->fetchAll('assoc');
		return $data;

	}
	public function itemProfitImpact(){
		$connection = ConnectionManager::get('default');
		// SELECT item_id,name, count(item_id) as frequency, sum(cost) as sell_price , items.cost_price*count(item_id) as cost, sum(cost) - items.cost_price*count(item_id) as profit   FROM `sales` INNER JOIN `items` ON items.id = item_id where sales.company_id = ?  GROUP BY name HAVING count(item_id) > 0
		// ORDER BY `profit`  DESC LIMIT 10
		$data = $connection->execute("SELECT name,  sum(cost) - items.cost_price*count(item_id) as dataSet   FROM `sales` INNER JOIN `items` ON items.id = item_id where sales.company_id = ?  GROUP BY name HAVING count(item_id) > 0
		ORDER BY `dataSet`  DESC LIMIT 10",[$_SESSION['Auth']['User']['company_id']])->fetchAll('assoc');
		return $data;
		
	}
	public function mostProfitableCategory(){
		$connection = ConnectionManager::get('default');
		$data = $connection->execute("SELECT categories.name,sum(cost) - items.cost_price*count(item_id) as dataSet   FROM `sales` INNER JOIN `items` ON items.id = item_id INNER JOIN categories ON categories.id = category_id where sales.company_id = ?  GROUP BY categories.name HAVING count(item_id) > 0
		ORDER BY `dataSet`  DESC LIMIT 10",[$_SESSION['Auth']['User']['company_id']])->fetchAll('assoc');
		return $data;
		
	}
	
}
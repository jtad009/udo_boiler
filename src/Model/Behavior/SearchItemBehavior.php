<?php
/**
 * Created by PhpStorm.
 * User: Epic
 * Date: 5/8/2018
 * Time: 3:54 PM
 */

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

class SearchItemBehavior extends Behavior
{
    private $search_param = [];

    /**
     * Search for items in the database during sale where quantity > 0
     * @param $query
     * @param array $search_param
     * @return mixed
     */
    public function findItem($query, array $search_param){
        $this->search_param = $search_param;
        $query->where(['quantity >'=>0]);
        $query->where(['hold'=>false]);
         $query->andWhere(function($exp){
            return $exp->or_([
                'name LIKE '=>$this->search_param['param'].'%',
                'product_code'=>$this->search_param['param'],
                
            ]);


        });
         $query->andWhere(function($exp){
            return $exp->or_([
                'location_id'=>$this->search_param['location_id'],
                'company_id'=>$this->search_param['company_id']
                
            ]);


        });
         
         
         return $query;

    }

    /**
     * return items that have quantities = to the minimum threshold
     * @param $query
     * @param array $options
     * @return mixed
     */
    public function findBelowStock($query,array $options){
        $query->select([
            'Items__id'=>'Items.id',
            'Items__name'=>'Items.name',
            'Items__quantity'=>'sum(Items.quantity)',
            'Items.unit_id' ,
            'Items.cost_price' ,
            'Items.markup',
            'Items.expiration_date' ,
            'Items.created',
            'Items.company_id' ,
            'Items.category_id' ,
            'Items.product_code' ,
            'Items.supplier_id',
            'Items.markup_wholesale' ,
            'Items.threshold',
            'Items.location_id' ,
            'Items.expired',
            'Items.hold',
            'Items.retail_sp',
            'Items.whole_sp' 
        ]);
        //$query->contain(['Units','Suppliers','Categories']);
        $query->Where(['Items.company_id'=>$options['company_id']]);
        if($options['exhaustedOnly'] == 1){//find items that are actually exhausted
            $query->Where(['Items.quantity <= '=>0]);
        }else{//find items that are near exhaustion but not exhausted
            $query->Where(['Items.quantity > '=>0]);
            $query->Where(['Items.quantity < '=>2]);
        }
        
        $query->group('Items.name');
        $query->having(['Items__quantity <='=>2]);
        if($options['paginate'] == 0):
            return $query->hydrate(false)->toArray();
        else:
            return $query;
        endif;
    }
    public function findSaleDetailSummary($query, $options){
         $query->select(['saleSum'=>'SUM(cost)'])->hydrate(false);
         return $query;
    }
    public function findDailyProfitSummary($query, $options){
         $query->select(['profitSum'=>'SUM(retail_sp - cost_price)'])->contain(['Items'])->hydrate(false);
         return $query;
    }
}
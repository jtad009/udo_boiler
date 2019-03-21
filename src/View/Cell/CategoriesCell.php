<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Categories cell
 */
class CategoriesCell extends Cell
{
    use \Cake\Log\LogTrait;

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
                $this->loadModel('ParentCategories');
                $this->loadModel('Categories');
                $this->set('parent',$this->ParentCategories->find('list',['conditions'=>['approved >'=>0,'category_count > '=>0],'keyField'=>'id','valueField'=>function($q){return $q->category.','.$q->icon;}])->toArray());
                $r = $this->ParentCategories->Categories->find('all')->contain(['ParentCategories'])->where(['Categories.approved'=>1,'ParentCategories.approved'=>1]);
                $this->log($r);
                $this->set('Categories',$this->ParentCategories->Categories->find()->hydrate(false)->toArray());
                
    }
}

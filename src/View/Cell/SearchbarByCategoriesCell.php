<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SearchbarByCategories cell
 */
class SearchbarByCategoriesCell extends Cell
{

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
        $this->loadModel('Categories');
        $this->set('categories',$this->Categories->find());
        $this->loadModel('Countries');
        $this->set('countries',$this->Countries->find());
        
    }
}

<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * HomeCategoryList cell
 */
class HomeCategoryListCell extends Cell {

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
    public function display() {
        $this->loadModel('ParentCategories');
        $categories = $this->ParentCategories->find()->where(['approved  > '=>0,'category_count > '=>0]);
        $this->set('categories', $categories);
    }

}

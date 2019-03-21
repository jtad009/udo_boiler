<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-sm-9  col-md-10 pt-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="list-inline">
            <li class="heading"><?= __('Actions') ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('Edit Document'), ['action' => 'edit', $document->id]) ?> </li>
            <li class="list-inline-item small"><?= $this->Form->postLink(__('Delete Document'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document'), ['action' => 'add']) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Document Categories'), ['controller' => 'DocumentCategories', 'action' => 'index']) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document Category'), ['controller' => 'DocumentCategories', 'action' => 'add']) ?> </li>
        </ul>
    </nav>
    <div class="col-sm-6">
        <div class="documents card image_print">
            <?= $this->Html->image('documents/'.$document->path,['alt'=>$document->title],['class'=>'card-img-top '])?>
            
            <table class="table table-sm table-bordered" >
                <tr>
                    <th scope="row"><?= __('Document Category') ?></th>
                    <td><?= $document->has('document_category') ? $this->Html->link($document->document_category->category, ['controller' => 'DocumentCategories', 'action' => 'view', $document->document_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Title') ?></th>
                    <td><?= h($document->title) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Path') ?></th>
                    <td><?= h($document->path) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($document->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Company Id') ?></th>
                    <td><?= $this->Number->format($document->company_id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($document->created) ?></td>
                </tr>
            </table>
            <button class="btn btn-block btn-danger avoid-this" id="printImage" onclick="Sales.printDocument()">Print Document</button>
        </div>
    

       
    </div>
</div>

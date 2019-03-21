<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-sm-9  col-md-10 pt-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="list-inline">
            <li class="heading"><?= __('Actions') ?></li>
            <li class="list-inline-item small"><?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $document->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]
                )
            ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Document Categories'), ['controller' => 'DocumentCategories', 'action' => 'index']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document Category'), ['controller' => 'DocumentCategories', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="documents card">
        <?= $this->Form->create($document,['type'=>'file']) ?>
        <fieldset class="card-body">
            <legend class="card-title text-center"><?= __('Edit Document') ?></legend>
            <?php
                echo $this->Form->input('document_category_id', ['options' => $documentCategories,'empty'=>'select category']);
                echo $this->Form->input('title');
                echo $this->Form->input('path',['type'=>'file','class'=>'form-control']);
                echo $this->Form->input('company_id',['options'=>$company]);
            ?>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-sm btn-danger']) ?>
        </fieldset>

        <?= $this->Form->end() ?>
    </div>
</div>

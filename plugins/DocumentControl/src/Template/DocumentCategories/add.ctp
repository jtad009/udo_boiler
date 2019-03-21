<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-sm-9  col-md-10 pt-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="list-inline">
            <li class="heading"><?= __('Actions') ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Document Categories'), ['action' => 'index']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class=" card">
        <?= $this->Form->create($documentCategory) ?>
        <fieldset class="card-body">
            <legend class="card-title text-center"><?= __('Add Document Category') ?></legend>
            <?php
                echo $this->Form->input('category');
                echo $this->Form->input('company_id', ['options' => $companies]);
                
            ?>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-sm btn-danger']) ?>
        </fieldset>

        <?= $this->Form->end() ?>
    </div>
</div>

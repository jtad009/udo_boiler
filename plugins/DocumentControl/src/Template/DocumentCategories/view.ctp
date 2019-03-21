<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-sm-9  col-md-10 pt-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="list-inline">
            <li class="heading"><?= __('Actions') ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('Edit Document Category'), ['action' => 'edit', $documentCategory->id]) ?> </li>
            <li class="list-inline-item small"><?= $this->Form->postLink(__('Delete Document Category'), ['action' => 'delete', $documentCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentCategory->id)]) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Document Categories'), ['action' => 'index']) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document Category'), ['action' => 'add']) ?> </li>
            
            <li class="list-inline-item small"><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
        </ul>
    </nav>
    <div class="documentCategories card">
        <h3 class="card-header"><?= h($documentCategory->category) ?></h3>
        <table class="table table-sm table-bordered ">
            <tr>
                <th scope="row"><?= __('Category') ?></th>
                <td><?= h($documentCategory->category) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Company') ?></th>
                <td><?= $documentCategory->has('company') ? $this->Html->link($documentCategory->company->name, ['controller' => 'Companies', 'action' => 'view', $documentCategory->company->id]) : '' ?></td>
            </tr>
            
            <tr>
                <th scope="row"><?= __('Document Count') ?></th>
                <td><?= $this->Number->format($documentCategory->document_count) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($documentCategory->created) ?></td>
            </tr>
        </table>
        <div class="related">
            <h4><?= __('Related Documents') ?></h4>
            <?php if (!empty($documentCategory->documents)): ?>
            <table class="table table-bordered">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Path') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($documentCategory->documents as $documents): ?>
                <tr>
                    <td><?= h($documents->id) ?></td>
                    
                    <td><?= h($documents->title) ?></td>
                    <td><?= h($documents->path) ?></td>
                    <td><?= h($documents->created) ?></td>
                    
                    <td class="actions">
                       <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['controller'=>'documents','action' => 'view', $documents->id],['class'=>'btn-link btn-sm','escape'=>false,'data-toggle'=>'tooltip','title'=>'View']) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['controller'=>'documents','action' => 'edit', $documents->id],['class'=>'btn-link btn-sm','escape'=>false,'data-toggle'=>'tooltip','title'=>'Edit']) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['controller'=>'documents','action' => 'delete', $documents->id], ['data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn-link btn-sm text-danger','escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $documents->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>

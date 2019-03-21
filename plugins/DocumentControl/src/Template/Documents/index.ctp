<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-sm-9  col-md-10 pt-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="list-inline">
            <li class="heading"><?= __('Actions') ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document'), ['action' => 'add']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('List Document Categories'), ['controller' => 'DocumentCategories', 'action' => 'index']) ?></li>
            <li class="list-inline-item small"><?= $this->Html->link(__('New Document Category'), ['controller' => 'DocumentCategories', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <?= $this->Flash->render()?>
    <div class="documents card">
        <h3 class="card-header"><?= __('Documents') ?></h3>
        <table class="table table-sm table-bordered ">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('document_category_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?= $this->Number->format($document->id) ?></td>
                    <td><?= $document->has('document_category') ? $this->Html->link($document->document_category->category, ['controller' => 'DocumentCategories', 'action' => 'view', $document->document_category->id]) : '' ?></td>
                    <td><?= h($document->title) ?></td>
                    <td><?= h($document->path) ?></td>
                    <td><?= h($document->created) ?></td>
                    <td><?= $this->Number->format($document->company_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $document->id],['class'=>'btn-link btn-sm','escape'=>false,'data-toggle'=>'tooltip','title'=>'View']) ?>
                        <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $document->id],['class'=>'btn-link btn-sm','escape'=>false,'data-toggle'=>'tooltip','title'=>'Edit']) ?>
                        <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $document->id], ['data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn-link btn-sm text-danger','escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $document->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination pagination-sm justify-content-sm-center">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p class="text-center"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
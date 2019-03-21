<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="col-sm-9  col-md-10 pt-3">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-inline">
        <li class="heading"><?= __('Actions') ?></li>
        <li class="list-inline-item small"><?= $this->Html->link(__('New Document Category'), ['action' => 'add']) ?></li>
       
        <li class="list-inline-item small"><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li class="list-inline-item small"><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
    </ul>
</nav>
    <div class="row">
        <div class="col-sm-12">
            <?= $this->Flash->render()?>
                <div class=" card">
                    <h3 class="card-header"><?= __('Document Categories') ?></h3>
                    <table class="table table-sm table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('document_count') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documentCategories as $documentCategory): ?>
                            <tr>
                                <td><?= $this->Number->format($documentCategory->id) ?></td>
                                <td><?= h($documentCategory->category) ?></td>
                                <td><?= h($documentCategory->created) ?></td>
                                <td><?= $documentCategory->has('company') ? $this->Html->link($documentCategory->company->name, ['controller' => 'Companies', 'action' => 'view', $documentCategory->company->id]) : '' ?></td>
                                <td><?= $this->Number->format($documentCategory->document_count) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $documentCategory->id],['class'=>'btn-link btn-sm','escape'=>false,'data-toggle'=>'tooltip','title'=>'View']) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $documentCategory->id],['class'=>'btn-link btn-sm','escape'=>false,'data-toggle'=>'tooltip','title'=>'Edit']) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $documentCategory->id], ['data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn-link btn-sm text-danger','escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $documentCategory->id)]) ?>
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
    </div>
</div>

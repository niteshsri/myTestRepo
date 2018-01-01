<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent[]|\Cake\Collection\CollectionInterface $talents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Talent'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Talent Services'), ['controller' => 'TalentServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Talent Service'), ['controller' => 'TalentServices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Talents'), ['controller' => 'UserTalents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Talent'), ['controller' => 'UserTalents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="talents index large-9 medium-8 columns content">
    <h3><?= __('Talents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($talents as $talent): ?>
            <tr>
                <td><?= $this->Number->format($talent->id) ?></td>
                <td><?= h($talent->name) ?></td>
                <td><?= h($talent->label) ?></td>
                <td><?= h($talent->status) ?></td>
                <td><?= h($talent->created) ?></td>
                <td><?= h($talent->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $talent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $talent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $talent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TalentService[]|\Cake\Collection\CollectionInterface $talentServices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Talent Service'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Talents'), ['controller' => 'Talents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Talent'), ['controller' => 'Talents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Talent Services'), ['controller' => 'UserTalentServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Talent Service'), ['controller' => 'UserTalentServices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="talentServices index large-9 medium-8 columns content">
    <h3><?= __('Talent Services') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('talent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($talentServices as $talentService): ?>
            <tr>
                <td><?= $this->Number->format($talentService->id) ?></td>
                <td><?= $talentService->has('talent') ? $this->Html->link($talentService->talent->name, ['controller' => 'Talents', 'action' => 'view', $talentService->talent->id]) : '' ?></td>
                <td><?= $talentService->has('service') ? $this->Html->link($talentService->service->name, ['controller' => 'Services', 'action' => 'view', $talentService->service->id]) : '' ?></td>
                <td><?= h($talentService->status) ?></td>
                <td><?= h($talentService->created) ?></td>
                <td><?= h($talentService->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $talentService->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $talentService->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $talentService->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talentService->id)]) ?>
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

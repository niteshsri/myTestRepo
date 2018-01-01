<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TalentService $talentService
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Talent Service'), ['action' => 'edit', $talentService->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Talent Service'), ['action' => 'delete', $talentService->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talentService->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Talent Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Talent Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Talents'), ['controller' => 'Talents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Talent'), ['controller' => 'Talents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Talent Services'), ['controller' => 'UserTalentServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Talent Service'), ['controller' => 'UserTalentServices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="talentServices view large-9 medium-8 columns content">
    <h3><?= h($talentService->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Talent') ?></th>
            <td><?= $talentService->has('talent') ? $this->Html->link($talentService->talent->name, ['controller' => 'Talents', 'action' => 'view', $talentService->talent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= $talentService->has('service') ? $this->Html->link($talentService->service->name, ['controller' => 'Services', 'action' => 'view', $talentService->service->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($talentService->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($talentService->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($talentService->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $talentService->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($talentService->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Talent Services') ?></h4>
        <?php if (!empty($talentService->user_talent_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Talent Service Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($talentService->user_talent_services as $userTalentServices): ?>
            <tr>
                <td><?= h($userTalentServices->id) ?></td>
                <td><?= h($userTalentServices->user_id) ?></td>
                <td><?= h($userTalentServices->talent_service_id) ?></td>
                <td><?= h($userTalentServices->status) ?></td>
                <td><?= h($userTalentServices->deleted) ?></td>
                <td><?= h($userTalentServices->created) ?></td>
                <td><?= h($userTalentServices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTalentServices', 'action' => 'view', $userTalentServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTalentServices', 'action' => 'edit', $userTalentServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTalentServices', 'action' => 'delete', $userTalentServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTalentServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

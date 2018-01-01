<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Talent'), ['action' => 'edit', $talent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Talent'), ['action' => 'delete', $talent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Talents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Talent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Talent Services'), ['controller' => 'TalentServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Talent Service'), ['controller' => 'TalentServices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Talents'), ['controller' => 'UserTalents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Talent'), ['controller' => 'UserTalents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="talents view large-9 medium-8 columns content">
    <h3><?= h($talent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($talent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($talent->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($talent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($talent->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($talent->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $talent->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($talent->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Talent Services') ?></h4>
        <?php if (!empty($talent->talent_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Talent Id') ?></th>
                <th scope="col"><?= __('Service Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($talent->talent_services as $talentServices): ?>
            <tr>
                <td><?= h($talentServices->id) ?></td>
                <td><?= h($talentServices->talent_id) ?></td>
                <td><?= h($talentServices->service_id) ?></td>
                <td><?= h($talentServices->description) ?></td>
                <td><?= h($talentServices->status) ?></td>
                <td><?= h($talentServices->created) ?></td>
                <td><?= h($talentServices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TalentServices', 'action' => 'view', $talentServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TalentServices', 'action' => 'edit', $talentServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TalentServices', 'action' => 'delete', $talentServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talentServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Talents') ?></h4>
        <?php if (!empty($talent->user_talents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Talent Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($talent->user_talents as $userTalents): ?>
            <tr>
                <td><?= h($userTalents->id) ?></td>
                <td><?= h($userTalents->user_id) ?></td>
                <td><?= h($userTalents->talent_id) ?></td>
                <td><?= h($userTalents->status) ?></td>
                <td><?= h($userTalents->deleted) ?></td>
                <td><?= h($userTalents->created) ?></td>
                <td><?= h($userTalents->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTalents', 'action' => 'view', $userTalents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTalents', 'action' => 'edit', $userTalents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTalents', 'action' => 'delete', $userTalents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTalents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hobby $hobby
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hobby'), ['action' => 'edit', $hobby->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hobby'), ['action' => 'delete', $hobby->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hobby->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hobbies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hobby'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Hobbies'), ['controller' => 'UserHobbies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Hobby'), ['controller' => 'UserHobbies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hobbies view large-9 medium-8 columns content">
    <h3><?= h($hobby->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($hobby->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($hobby->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($hobby->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($hobby->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($hobby->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $hobby->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($hobby->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Hobbies') ?></h4>
        <?php if (!empty($hobby->user_hobbies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Hobby Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hobby->user_hobbies as $userHobbies): ?>
            <tr>
                <td><?= h($userHobbies->id) ?></td>
                <td><?= h($userHobbies->user_id) ?></td>
                <td><?= h($userHobbies->hobby_id) ?></td>
                <td><?= h($userHobbies->status) ?></td>
                <td><?= h($userHobbies->deleted) ?></td>
                <td><?= h($userHobbies->created) ?></td>
                <td><?= h($userHobbies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHobbies', 'action' => 'view', $userHobbies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHobbies', 'action' => 'edit', $userHobbies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHobbies', 'action' => 'delete', $userHobbies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHobbies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

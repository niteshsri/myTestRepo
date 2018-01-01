<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discipline $discipline
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Discipline'), ['action' => 'edit', $discipline->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Discipline'), ['action' => 'delete', $discipline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discipline->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Disciplines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Discipline'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Disciplines'), ['controller' => 'UserDisciplines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Discipline'), ['controller' => 'UserDisciplines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="disciplines view large-9 medium-8 columns content">
    <h3><?= h($discipline->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($discipline->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($discipline->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($discipline->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($discipline->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($discipline->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $discipline->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($discipline->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Disciplines') ?></h4>
        <?php if (!empty($discipline->user_disciplines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Discipline Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($discipline->user_disciplines as $userDisciplines): ?>
            <tr>
                <td><?= h($userDisciplines->id) ?></td>
                <td><?= h($userDisciplines->user_id) ?></td>
                <td><?= h($userDisciplines->discipline_id) ?></td>
                <td><?= h($userDisciplines->status) ?></td>
                <td><?= h($userDisciplines->deleted) ?></td>
                <td><?= h($userDisciplines->created) ?></td>
                <td><?= h($userDisciplines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserDisciplines', 'action' => 'view', $userDisciplines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserDisciplines', 'action' => 'edit', $userDisciplines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserDisciplines', 'action' => 'delete', $userDisciplines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDisciplines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

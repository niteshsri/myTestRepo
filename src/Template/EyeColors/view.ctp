<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EyeColor $eyeColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Eye Color'), ['action' => 'edit', $eyeColor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Eye Color'), ['action' => 'delete', $eyeColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eyeColor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Eye Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Eye Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eyeColors view large-9 medium-8 columns content">
    <h3><?= h($eyeColor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($eyeColor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($eyeColor->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eyeColor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($eyeColor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($eyeColor->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $eyeColor->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($eyeColor->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Details') ?></h4>
        <?php if (!empty($eyeColor->user_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Work Type Id') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Waist') ?></th>
                <th scope="col"><?= __('Chest') ?></th>
                <th scope="col"><?= __('Ethinicity Id') ?></th>
                <th scope="col"><?= __('Eye Color Id') ?></th>
                <th scope="col"><?= __('Hair Color Id') ?></th>
                <th scope="col"><?= __('Hips') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eyeColor->user_details as $userDetails): ?>
            <tr>
                <td><?= h($userDetails->id) ?></td>
                <td><?= h($userDetails->user_id) ?></td>
                <td><?= h($userDetails->work_type_id) ?></td>
                <td><?= h($userDetails->dob) ?></td>
                <td><?= h($userDetails->gender) ?></td>
                <td><?= h($userDetails->height) ?></td>
                <td><?= h($userDetails->weight) ?></td>
                <td><?= h($userDetails->waist) ?></td>
                <td><?= h($userDetails->chest) ?></td>
                <td><?= h($userDetails->ethinicity_id) ?></td>
                <td><?= h($userDetails->eye_color_id) ?></td>
                <td><?= h($userDetails->hair_color_id) ?></td>
                <td><?= h($userDetails->hips) ?></td>
                <td><?= h($userDetails->bio) ?></td>
                <td><?= h($userDetails->status) ?></td>
                <td><?= h($userDetails->deleted) ?></td>
                <td><?= h($userDetails->created) ?></td>
                <td><?= h($userDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserDetails', 'action' => 'view', $userDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserDetails', 'action' => 'edit', $userDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserDetails', 'action' => 'delete', $userDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Languages'), ['controller' => 'UserLanguages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Language'), ['controller' => 'UserLanguages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="languages view large-9 medium-8 columns content">
    <h3><?= h($language->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($language->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($language->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($language->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($language->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($language->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $language->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($language->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Languages') ?></h4>
        <?php if (!empty($language->user_languages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Language Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($language->user_languages as $userLanguages): ?>
            <tr>
                <td><?= h($userLanguages->id) ?></td>
                <td><?= h($userLanguages->user_id) ?></td>
                <td><?= h($userLanguages->language_id) ?></td>
                <td><?= h($userLanguages->status) ?></td>
                <td><?= h($userLanguages->deleted) ?></td>
                <td><?= h($userLanguages->created) ?></td>
                <td><?= h($userLanguages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLanguages', 'action' => 'view', $userLanguages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLanguages', 'action' => 'edit', $userLanguages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLanguages', 'action' => 'delete', $userLanguages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLanguages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

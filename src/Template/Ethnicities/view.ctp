<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ethnicity $ethnicity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ethnicity'), ['action' => 'edit', $ethnicity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ethnicity'), ['action' => 'delete', $ethnicity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ethnicity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ethnicities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ethnicity'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ethnicities view large-9 medium-8 columns content">
    <h3><?= h($ethnicity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($ethnicity->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($ethnicity->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ethnicity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ethnicity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ethnicity->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $ethnicity->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($ethnicity->description)); ?>
    </div>
</div>

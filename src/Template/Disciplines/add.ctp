<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discipline $discipline
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Disciplines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Disciplines'), ['controller' => 'UserDisciplines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Discipline'), ['controller' => 'UserDisciplines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="disciplines form large-9 medium-8 columns content">
    <?= $this->Form->create($discipline) ?>
    <fieldset>
        <legend><?= __('Add Discipline') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('label');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

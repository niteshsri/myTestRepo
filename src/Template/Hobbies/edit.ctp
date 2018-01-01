<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hobby $hobby
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hobby->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hobby->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hobbies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Hobbies'), ['controller' => 'UserHobbies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Hobby'), ['controller' => 'UserHobbies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hobbies form large-9 medium-8 columns content">
    <?= $this->Form->create($hobby) ?>
    <fieldset>
        <legend><?= __('Edit Hobby') ?></legend>
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

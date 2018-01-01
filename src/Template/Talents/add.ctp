<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Talents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Talent Services'), ['controller' => 'TalentServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Talent Service'), ['controller' => 'TalentServices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Talents'), ['controller' => 'UserTalents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Talent'), ['controller' => 'UserTalents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="talents form large-9 medium-8 columns content">
    <?= $this->Form->create($talent) ?>
    <fieldset>
        <legend><?= __('Add Talent') ?></legend>
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

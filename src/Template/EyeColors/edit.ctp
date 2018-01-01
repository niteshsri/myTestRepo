<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EyeColor $eyeColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eyeColor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eyeColor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Eye Colors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eyeColors form large-9 medium-8 columns content">
    <?= $this->Form->create($eyeColor) ?>
    <fieldset>
        <legend><?= __('Edit Eye Color') ?></legend>
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

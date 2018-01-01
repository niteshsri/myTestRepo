<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HairColor $hairColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hairColor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hairColor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hair Colors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hairColors form large-9 medium-8 columns content">
    <?= $this->Form->create($hairColor) ?>
    <fieldset>
        <legend><?= __('Edit Hair Color') ?></legend>
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

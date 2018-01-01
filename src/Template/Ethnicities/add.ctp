<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ethnicity $ethnicity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ethnicities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ethnicities form large-9 medium-8 columns content">
    <?= $this->Form->create($ethnicity) ?>
    <fieldset>
        <legend><?= __('Add Ethnicity') ?></legend>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialService $socialService
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $socialService->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $socialService->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Social Services'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Social Connections'), ['controller' => 'UserSocialConnections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Social Connection'), ['controller' => 'UserSocialConnections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socialServices form large-9 medium-8 columns content">
    <?= $this->Form->create($socialService) ?>
    <fieldset>
        <legend><?= __('Edit Social Service') ?></legend>
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

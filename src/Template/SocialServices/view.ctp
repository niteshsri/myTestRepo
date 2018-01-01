<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialService $socialService
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Social Service'), ['action' => 'edit', $socialService->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Social Service'), ['action' => 'delete', $socialService->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialService->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Social Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Social Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Social Connections'), ['controller' => 'UserSocialConnections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Social Connection'), ['controller' => 'UserSocialConnections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="socialServices view large-9 medium-8 columns content">
    <h3><?= h($socialService->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($socialService->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($socialService->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($socialService->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($socialService->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($socialService->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $socialService->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($socialService->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Social Connections') ?></h4>
        <?php if (!empty($socialService->user_social_connections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Social Service Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($socialService->user_social_connections as $userSocialConnections): ?>
            <tr>
                <td><?= h($userSocialConnections->id) ?></td>
                <td><?= h($userSocialConnections->user_id) ?></td>
                <td><?= h($userSocialConnections->social_service_id) ?></td>
                <td><?= h($userSocialConnections->status) ?></td>
                <td><?= h($userSocialConnections->deleted) ?></td>
                <td><?= h($userSocialConnections->created) ?></td>
                <td><?= h($userSocialConnections->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserSocialConnections', 'action' => 'view', $userSocialConnections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserSocialConnections', 'action' => 'edit', $userSocialConnections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSocialConnections', 'action' => 'delete', $userSocialConnections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocialConnections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

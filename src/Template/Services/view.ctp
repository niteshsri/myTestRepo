<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Talent Services'), ['controller' => 'TalentServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Talent Service'), ['controller' => 'TalentServices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="services view large-9 medium-8 columns content">
    <h3><?= h($service->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($service->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($service->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($service->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($service->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($service->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $service->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($service->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Talent Services') ?></h4>
        <?php if (!empty($service->talent_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Talent Id') ?></th>
                <th scope="col"><?= __('Service Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($service->talent_services as $talentServices): ?>
            <tr>
                <td><?= h($talentServices->id) ?></td>
                <td><?= h($talentServices->talent_id) ?></td>
                <td><?= h($talentServices->service_id) ?></td>
                <td><?= h($talentServices->description) ?></td>
                <td><?= h($talentServices->status) ?></td>
                <td><?= h($talentServices->created) ?></td>
                <td><?= h($talentServices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TalentServices', 'action' => 'view', $talentServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TalentServices', 'action' => 'edit', $talentServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TalentServices', 'action' => 'delete', $talentServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talentServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

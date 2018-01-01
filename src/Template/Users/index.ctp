<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Addresses'), ['controller' => 'UserAddresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Address'), ['controller' => 'UserAddresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Disciplines'), ['controller' => 'UserDisciplines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Discipline'), ['controller' => 'UserDisciplines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Favourites'), ['controller' => 'UserFavourites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Favourite'), ['controller' => 'UserFavourites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Followers'), ['controller' => 'UserFollowers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Follower'), ['controller' => 'UserFollowers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Hobbies'), ['controller' => 'UserHobbies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Hobby'), ['controller' => 'UserHobbies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Images'), ['controller' => 'UserImages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Image'), ['controller' => 'UserImages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Languages'), ['controller' => 'UserLanguages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Language'), ['controller' => 'UserLanguages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Likes'), ['controller' => 'UserLikes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Like'), ['controller' => 'UserLikes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Locations'), ['controller' => 'UserLocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Location'), ['controller' => 'UserLocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Social Connections'), ['controller' => 'UserSocialConnections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Social Connection'), ['controller' => 'UserSocialConnections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Talent Services'), ['controller' => 'UserTalentServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Talent Service'), ['controller' => 'UserTalentServices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Talents'), ['controller' => 'UserTalents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Talent'), ['controller' => 'UserTalents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Testimonials'), ['controller' => 'UserTestimonials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Testimonial'), ['controller' => 'UserTestimonials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Views'), ['controller' => 'UserViews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User View'), ['controller' => 'UserViews', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uuid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_image_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_image_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cover_image_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cover_image_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_talent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                <td><?= h($user->uuid) ?></td>
                <td><?= h($user->profile_image_name) ?></td>
                <td><?= h($user->profile_image_path) ?></td>
                <td><?= h($user->cover_image_name) ?></td>
                <td><?= h($user->cover_image_path) ?></td>
                <td><?= h($user->status) ?></td>
                <td><?= h($user->is_talent) ?></td>
                <td><?= h($user->is_active) ?></td>
                <td><?= h($user->deleted) ?></td>
                <td><?= h($user->last_login) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

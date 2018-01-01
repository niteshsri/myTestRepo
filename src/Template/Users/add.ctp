<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
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
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('uuid');
            echo $this->Form->control('profile_image_name');
            echo $this->Form->control('profile_image_path');
            echo $this->Form->control('profile_image_url');
            echo $this->Form->control('cover_image_name');
            echo $this->Form->control('cover_image_path');
            echo $this->Form->control('cover_image_url');
            echo $this->Form->control('status');
            echo $this->Form->control('is_talent');
            echo $this->Form->control('is_active');
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('last_login', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

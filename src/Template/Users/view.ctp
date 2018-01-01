<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Addresses'), ['controller' => 'UserAddresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Address'), ['controller' => 'UserAddresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Disciplines'), ['controller' => 'UserDisciplines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Discipline'), ['controller' => 'UserDisciplines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Favourites'), ['controller' => 'UserFavourites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Favourite'), ['controller' => 'UserFavourites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Followers'), ['controller' => 'UserFollowers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Follower'), ['controller' => 'UserFollowers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Hobbies'), ['controller' => 'UserHobbies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Hobby'), ['controller' => 'UserHobbies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Images'), ['controller' => 'UserImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Image'), ['controller' => 'UserImages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Languages'), ['controller' => 'UserLanguages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Language'), ['controller' => 'UserLanguages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Likes'), ['controller' => 'UserLikes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Like'), ['controller' => 'UserLikes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Locations'), ['controller' => 'UserLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Location'), ['controller' => 'UserLocations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Social Connections'), ['controller' => 'UserSocialConnections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Social Connection'), ['controller' => 'UserSocialConnections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Talent Services'), ['controller' => 'UserTalentServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Talent Service'), ['controller' => 'UserTalentServices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Talents'), ['controller' => 'UserTalents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Talent'), ['controller' => 'UserTalents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Testimonials'), ['controller' => 'UserTestimonials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Testimonial'), ['controller' => 'UserTestimonials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Views'), ['controller' => 'UserViews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User View'), ['controller' => 'UserViews', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uuid') ?></th>
            <td><?= h($user->uuid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Image Name') ?></th>
            <td><?= h($user->profile_image_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Image Path') ?></th>
            <td><?= h($user->profile_image_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cover Image Name') ?></th>
            <td><?= h($user->cover_image_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cover Image Path') ?></th>
            <td><?= h($user->cover_image_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($user->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($user->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $user->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Talent') ?></th>
            <td><?= $user->is_talent ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Profile Image Url') ?></h4>
        <?= $this->Text->autoParagraph(h($user->profile_image_url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cover Image Url') ?></h4>
        <?= $this->Text->autoParagraph(h($user->cover_image_url)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Addresses') ?></h4>
        <?php if (!empty($user->user_addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Add1') ?></th>
                <th scope="col"><?= __('Add2') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Postal Code') ?></th>
                <th scope="col"><?= __('Landmark') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_addresses as $userAddresses): ?>
            <tr>
                <td><?= h($userAddresses->id) ?></td>
                <td><?= h($userAddresses->user_id) ?></td>
                <td><?= h($userAddresses->add1) ?></td>
                <td><?= h($userAddresses->add2) ?></td>
                <td><?= h($userAddresses->city) ?></td>
                <td><?= h($userAddresses->state) ?></td>
                <td><?= h($userAddresses->country) ?></td>
                <td><?= h($userAddresses->postal_code) ?></td>
                <td><?= h($userAddresses->landmark) ?></td>
                <td><?= h($userAddresses->contact) ?></td>
                <td><?= h($userAddresses->status) ?></td>
                <td><?= h($userAddresses->deleted) ?></td>
                <td><?= h($userAddresses->created) ?></td>
                <td><?= h($userAddresses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserAddresses', 'action' => 'view', $userAddresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserAddresses', 'action' => 'edit', $userAddresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserAddresses', 'action' => 'delete', $userAddresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userAddresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Details') ?></h4>
        <?php if (!empty($user->user_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Work Type Id') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Waist') ?></th>
                <th scope="col"><?= __('Chest') ?></th>
                <th scope="col"><?= __('Ethinicity Id') ?></th>
                <th scope="col"><?= __('Eye Color Id') ?></th>
                <th scope="col"><?= __('Hair Color Id') ?></th>
                <th scope="col"><?= __('Hips') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_details as $userDetails): ?>
            <tr>
                <td><?= h($userDetails->id) ?></td>
                <td><?= h($userDetails->user_id) ?></td>
                <td><?= h($userDetails->work_type_id) ?></td>
                <td><?= h($userDetails->dob) ?></td>
                <td><?= h($userDetails->gender) ?></td>
                <td><?= h($userDetails->height) ?></td>
                <td><?= h($userDetails->weight) ?></td>
                <td><?= h($userDetails->waist) ?></td>
                <td><?= h($userDetails->chest) ?></td>
                <td><?= h($userDetails->ethinicity_id) ?></td>
                <td><?= h($userDetails->eye_color_id) ?></td>
                <td><?= h($userDetails->hair_color_id) ?></td>
                <td><?= h($userDetails->hips) ?></td>
                <td><?= h($userDetails->bio) ?></td>
                <td><?= h($userDetails->status) ?></td>
                <td><?= h($userDetails->deleted) ?></td>
                <td><?= h($userDetails->created) ?></td>
                <td><?= h($userDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserDetails', 'action' => 'view', $userDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserDetails', 'action' => 'edit', $userDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserDetails', 'action' => 'delete', $userDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Disciplines') ?></h4>
        <?php if (!empty($user->user_disciplines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Discipline Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_disciplines as $userDisciplines): ?>
            <tr>
                <td><?= h($userDisciplines->id) ?></td>
                <td><?= h($userDisciplines->user_id) ?></td>
                <td><?= h($userDisciplines->discipline_id) ?></td>
                <td><?= h($userDisciplines->status) ?></td>
                <td><?= h($userDisciplines->deleted) ?></td>
                <td><?= h($userDisciplines->created) ?></td>
                <td><?= h($userDisciplines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserDisciplines', 'action' => 'view', $userDisciplines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserDisciplines', 'action' => 'edit', $userDisciplines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserDisciplines', 'action' => 'delete', $userDisciplines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDisciplines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Favourites') ?></h4>
        <?php if (!empty($user->user_favourites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Fav Identifier') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_favourites as $userFavourites): ?>
            <tr>
                <td><?= h($userFavourites->id) ?></td>
                <td><?= h($userFavourites->user_id) ?></td>
                <td><?= h($userFavourites->fav_identifier) ?></td>
                <td><?= h($userFavourites->status) ?></td>
                <td><?= h($userFavourites->deleted) ?></td>
                <td><?= h($userFavourites->created) ?></td>
                <td><?= h($userFavourites->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserFavourites', 'action' => 'view', $userFavourites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserFavourites', 'action' => 'edit', $userFavourites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserFavourites', 'action' => 'delete', $userFavourites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userFavourites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Followers') ?></h4>
        <?php if (!empty($user->user_followers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Follower Identifier') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_followers as $userFollowers): ?>
            <tr>
                <td><?= h($userFollowers->id) ?></td>
                <td><?= h($userFollowers->user_id) ?></td>
                <td><?= h($userFollowers->follower_identifier) ?></td>
                <td><?= h($userFollowers->status) ?></td>
                <td><?= h($userFollowers->deleted) ?></td>
                <td><?= h($userFollowers->created) ?></td>
                <td><?= h($userFollowers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserFollowers', 'action' => 'view', $userFollowers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserFollowers', 'action' => 'edit', $userFollowers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserFollowers', 'action' => 'delete', $userFollowers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userFollowers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Hobbies') ?></h4>
        <?php if (!empty($user->user_hobbies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Hobby Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_hobbies as $userHobbies): ?>
            <tr>
                <td><?= h($userHobbies->id) ?></td>
                <td><?= h($userHobbies->user_id) ?></td>
                <td><?= h($userHobbies->hobby_id) ?></td>
                <td><?= h($userHobbies->status) ?></td>
                <td><?= h($userHobbies->deleted) ?></td>
                <td><?= h($userHobbies->created) ?></td>
                <td><?= h($userHobbies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHobbies', 'action' => 'view', $userHobbies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHobbies', 'action' => 'edit', $userHobbies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHobbies', 'action' => 'delete', $userHobbies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHobbies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Images') ?></h4>
        <?php if (!empty($user->user_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Image Name') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Image Path') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_images as $userImages): ?>
            <tr>
                <td><?= h($userImages->id) ?></td>
                <td><?= h($userImages->user_id) ?></td>
                <td><?= h($userImages->image_name) ?></td>
                <td><?= h($userImages->image_url) ?></td>
                <td><?= h($userImages->image_path) ?></td>
                <td><?= h($userImages->status) ?></td>
                <td><?= h($userImages->deleted) ?></td>
                <td><?= h($userImages->created) ?></td>
                <td><?= h($userImages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserImages', 'action' => 'view', $userImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserImages', 'action' => 'edit', $userImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserImages', 'action' => 'delete', $userImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Languages') ?></h4>
        <?php if (!empty($user->user_languages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Language Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_languages as $userLanguages): ?>
            <tr>
                <td><?= h($userLanguages->id) ?></td>
                <td><?= h($userLanguages->user_id) ?></td>
                <td><?= h($userLanguages->language_id) ?></td>
                <td><?= h($userLanguages->status) ?></td>
                <td><?= h($userLanguages->deleted) ?></td>
                <td><?= h($userLanguages->created) ?></td>
                <td><?= h($userLanguages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLanguages', 'action' => 'view', $userLanguages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLanguages', 'action' => 'edit', $userLanguages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLanguages', 'action' => 'delete', $userLanguages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLanguages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Likes') ?></h4>
        <?php if (!empty($user->user_likes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Liker Identifier') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_likes as $userLikes): ?>
            <tr>
                <td><?= h($userLikes->id) ?></td>
                <td><?= h($userLikes->user_id) ?></td>
                <td><?= h($userLikes->liker_identifier) ?></td>
                <td><?= h($userLikes->status) ?></td>
                <td><?= h($userLikes->deleted) ?></td>
                <td><?= h($userLikes->created) ?></td>
                <td><?= h($userLikes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLikes', 'action' => 'view', $userLikes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLikes', 'action' => 'edit', $userLikes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLikes', 'action' => 'delete', $userLikes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLikes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Locations') ?></h4>
        <?php if (!empty($user->user_locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_locations as $userLocations): ?>
            <tr>
                <td><?= h($userLocations->id) ?></td>
                <td><?= h($userLocations->user_id) ?></td>
                <td><?= h($userLocations->city) ?></td>
                <td><?= h($userLocations->state) ?></td>
                <td><?= h($userLocations->country) ?></td>
                <td><?= h($userLocations->contact) ?></td>
                <td><?= h($userLocations->status) ?></td>
                <td><?= h($userLocations->deleted) ?></td>
                <td><?= h($userLocations->created) ?></td>
                <td><?= h($userLocations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLocations', 'action' => 'view', $userLocations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLocations', 'action' => 'edit', $userLocations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLocations', 'action' => 'delete', $userLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLocations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Social Connections') ?></h4>
        <?php if (!empty($user->user_social_connections)): ?>
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
            <?php foreach ($user->user_social_connections as $userSocialConnections): ?>
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
    <div class="related">
        <h4><?= __('Related User Talent Services') ?></h4>
        <?php if (!empty($user->user_talent_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Talent Service Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_talent_services as $userTalentServices): ?>
            <tr>
                <td><?= h($userTalentServices->id) ?></td>
                <td><?= h($userTalentServices->user_id) ?></td>
                <td><?= h($userTalentServices->talent_service_id) ?></td>
                <td><?= h($userTalentServices->status) ?></td>
                <td><?= h($userTalentServices->deleted) ?></td>
                <td><?= h($userTalentServices->created) ?></td>
                <td><?= h($userTalentServices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTalentServices', 'action' => 'view', $userTalentServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTalentServices', 'action' => 'edit', $userTalentServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTalentServices', 'action' => 'delete', $userTalentServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTalentServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Talents') ?></h4>
        <?php if (!empty($user->user_talents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Talent Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_talents as $userTalents): ?>
            <tr>
                <td><?= h($userTalents->id) ?></td>
                <td><?= h($userTalents->user_id) ?></td>
                <td><?= h($userTalents->talent_id) ?></td>
                <td><?= h($userTalents->status) ?></td>
                <td><?= h($userTalents->deleted) ?></td>
                <td><?= h($userTalents->created) ?></td>
                <td><?= h($userTalents->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTalents', 'action' => 'view', $userTalents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTalents', 'action' => 'edit', $userTalents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTalents', 'action' => 'delete', $userTalents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTalents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Testimonials') ?></h4>
        <?php if (!empty($user->user_testimonials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Testimonial') ?></th>
                <th scope="col"><?= __('Provider Identifier') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_testimonials as $userTestimonials): ?>
            <tr>
                <td><?= h($userTestimonials->id) ?></td>
                <td><?= h($userTestimonials->user_id) ?></td>
                <td><?= h($userTestimonials->testimonial) ?></td>
                <td><?= h($userTestimonials->provider_identifier) ?></td>
                <td><?= h($userTestimonials->status) ?></td>
                <td><?= h($userTestimonials->deleted) ?></td>
                <td><?= h($userTestimonials->created) ?></td>
                <td><?= h($userTestimonials->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTestimonials', 'action' => 'view', $userTestimonials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTestimonials', 'action' => 'edit', $userTestimonials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTestimonials', 'action' => 'delete', $userTestimonials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTestimonials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Views') ?></h4>
        <?php if (!empty($user->user_views)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Viewer Identifier') ?></th>
                <th scope="col"><?= __('Provider Identifier') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_views as $userViews): ?>
            <tr>
                <td><?= h($userViews->id) ?></td>
                <td><?= h($userViews->user_id) ?></td>
                <td><?= h($userViews->viewer_identifier) ?></td>
                <td><?= h($userViews->provider_identifier) ?></td>
                <td><?= h($userViews->status) ?></td>
                <td><?= h($userViews->deleted) ?></td>
                <td><?= h($userViews->created) ?></td>
                <td><?= h($userViews->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserViews', 'action' => 'view', $userViews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserViews', 'action' => 'edit', $userViews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserViews', 'action' => 'delete', $userViews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userViews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

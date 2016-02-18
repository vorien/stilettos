<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Display'), ['action' => 'edit', $display->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Display'), ['action' => 'delete', $display->id], ['confirm' => __('Are you sure you want to delete # {0}?', $display->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Displays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Display'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="displays view large-9 medium-8 columns content">
    <h3><?= h($display->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($display->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($display->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($display->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($display->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Power') ?></th>
            <td><?= $display->power ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Modifiers') ?></h4>
        <?php if (!empty($display->modifiers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Locklevel') ?></th>
                <th><?= __('Required') ?></th>
                <th><?= __('Display Id') ?></th>
                <th><?= __('Modifier Class Id') ?></th>
                <th><?= __('Modifier Type Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($display->modifiers as $modifiers): ?>
            <tr>
                <td><?= h($modifiers->id) ?></td>
                <td><?= h($modifiers->name) ?></td>
                <td><?= h($modifiers->locklevel) ?></td>
                <td><?= h($modifiers->required) ?></td>
                <td><?= h($modifiers->display_id) ?></td>
                <td><?= h($modifiers->modifier_class_id) ?></td>
                <td><?= h($modifiers->modifier_type_id) ?></td>
                <td><?= h($modifiers->created) ?></td>
                <td><?= h($modifiers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Modifiers', 'action' => 'view', $modifiers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Modifiers', 'action' => 'edit', $modifiers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modifiers', 'action' => 'delete', $modifiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifiers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Abilities') ?></h4>
        <?php if (!empty($display->abilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Duration') ?></th>
                <th><?= __('Target') ?></th>
                <th><?= __('Has Range') ?></th>
                <th><?= __('Use End') ?></th>
                <th><?= __('Maneuver Id') ?></th>
                <th><?= __('Power Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($display->abilities as $abilities): ?>
            <tr>
                <td><?= h($abilities->id) ?></td>
                <td><?= h($abilities->name) ?></td>
                <td><?= h($abilities->type) ?></td>
                <td><?= h($abilities->duration) ?></td>
                <td><?= h($abilities->target) ?></td>
                <td><?= h($abilities->has_range) ?></td>
                <td><?= h($abilities->use_end) ?></td>
                <td><?= h($abilities->maneuver_id) ?></td>
                <td><?= h($abilities->power_id) ?></td>
                <td><?= h($abilities->created) ?></td>
                <td><?= h($abilities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Abilities', 'action' => 'view', $abilities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Abilities', 'action' => 'edit', $abilities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Abilities', 'action' => 'delete', $abilities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abilities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

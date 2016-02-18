<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ability'), ['action' => 'edit', $ability->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ability'), ['action' => 'delete', $ability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ability->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Abilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ability'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['controller' => 'Maneuvers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Maneuver'), ['controller' => 'Maneuvers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Powers'), ['controller' => 'Powers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Power'), ['controller' => 'Powers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="abilities view large-9 medium-8 columns content">
    <h3><?= h($ability->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($ability->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($ability->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= h($ability->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Target') ?></th>
            <td><?= h($ability->target) ?></td>
        </tr>
        <tr>
            <th><?= __('Has Range') ?></th>
            <td><?= h($ability->has_range) ?></td>
        </tr>
        <tr>
            <th><?= __('Use End') ?></th>
            <td><?= h($ability->use_end) ?></td>
        </tr>
        <tr>
            <th><?= __('Maneuver') ?></th>
            <td><?= $ability->has('maneuver') ? $this->Html->link($ability->maneuver->name, ['controller' => 'Maneuvers', 'action' => 'view', $ability->maneuver->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Power') ?></th>
            <td><?= $ability->has('power') ? $this->Html->link($ability->power->name, ['controller' => 'Powers', 'action' => 'view', $ability->power->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ability->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($ability->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($ability->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Displays') ?></h4>
        <?php if (!empty($ability->displays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Power') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ability->displays as $displays): ?>
            <tr>
                <td><?= h($displays->id) ?></td>
                <td><?= h($displays->name) ?></td>
                <td><?= h($displays->power) ?></td>
                <td><?= h($displays->created) ?></td>
                <td><?= h($displays->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Displays', 'action' => 'view', $displays->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Displays', 'action' => 'edit', $displays->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Displays', 'action' => 'delete', $displays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $displays->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

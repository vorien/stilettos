<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Maneuver'), ['action' => 'edit', $maneuver->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Maneuver'), ['action' => 'delete', $maneuver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maneuver->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Maneuver'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="maneuvers view large-9 medium-8 columns content">
    <h3><?= h($maneuver->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($maneuver->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($maneuver->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Locklevel') ?></th>
            <td><?= $this->Number->format($maneuver->locklevel) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($maneuver->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($maneuver->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Abilities') ?></h4>
        <?php if (!empty($maneuver->abilities)): ?>
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
            <?php foreach ($maneuver->abilities as $abilities): ?>
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

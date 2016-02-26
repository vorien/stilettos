<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Power'), ['action' => 'edit', $power->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Power'), ['action' => 'delete', $power->id], ['confirm' => __('Are you sure you want to delete # {0}?', $power->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Powers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Power'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['controller' => 'Maneuvers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Maneuver'), ['controller' => 'Maneuvers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targets'), ['controller' => 'Targets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Target'), ['controller' => 'Targets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="powers view large-9 medium-8 columns content">
    <h3><?= h($power->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($power->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($power->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= h($power->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Target') ?></th>
            <td><?= h($power->target) ?></td>
        </tr>
        <tr>
            <th><?= __('Has Range') ?></th>
            <td><?= h($power->has_range) ?></td>
        </tr>
        <tr>
            <th><?= __('Use End') ?></th>
            <td><?= h($power->use_end) ?></td>
        </tr>
        <tr>
            <th><?= __('Maneuver') ?></th>
            <td><?= $power->has('maneuver') ? $this->Html->link($power->maneuver->name, ['controller' => 'Maneuvers', 'action' => 'view', $power->maneuver->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($power->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($power->sort_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Lock Level') ?></th>
            <td><?= $this->Number->format($power->lock_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($power->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($power->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $power->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Targets') ?></h4>
        <?php if (!empty($power->targets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Sort Order') ?></th>
                <th><?= __('Power Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($power->targets as $targets): ?>
            <tr>
                <td><?= h($targets->id) ?></td>
                <td><?= h($targets->name) ?></td>
                <td><?= h($targets->sort_order) ?></td>
                <td><?= h($targets->power_id) ?></td>
                <td><?= h($targets->created) ?></td>
                <td><?= h($targets->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Targets', 'action' => 'view', $targets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Targets', 'action' => 'edit', $targets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Targets', 'action' => 'delete', $targets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $targets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

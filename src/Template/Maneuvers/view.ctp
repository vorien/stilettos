<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Maneuver'), ['action' => 'edit', $maneuver->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Maneuver'), ['action' => 'delete', $maneuver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maneuver->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Maneuver'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Powers'), ['controller' => 'Powers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Power'), ['controller' => 'Powers', 'action' => 'add']) ?> </li>
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
            <th><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($maneuver->sort_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Lock Level') ?></th>
            <td><?= $this->Number->format($maneuver->lock_level) ?></td>
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
        <h4><?= __('Related Powers') ?></h4>
        <?php if (!empty($maneuver->powers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Sort Order') ?></th>
                <th><?= __('Lock Level') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Duration') ?></th>
                <th><?= __('Target') ?></th>
                <th><?= __('Has Range') ?></th>
                <th><?= __('Use End') ?></th>
                <th><?= __('Maneuver Id') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($maneuver->powers as $powers): ?>
            <tr>
                <td><?= h($powers->id) ?></td>
                <td><?= h($powers->name) ?></td>
                <td><?= h($powers->sort_order) ?></td>
                <td><?= h($powers->lock_level) ?></td>
                <td><?= h($powers->type) ?></td>
                <td><?= h($powers->duration) ?></td>
                <td><?= h($powers->target) ?></td>
                <td><?= h($powers->has_range) ?></td>
                <td><?= h($powers->use_end) ?></td>
                <td><?= h($powers->maneuver_id) ?></td>
                <td><?= h($powers->active) ?></td>
                <td><?= h($powers->created) ?></td>
                <td><?= h($powers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Powers', 'action' => 'view', $powers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Powers', 'action' => 'edit', $powers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Powers', 'action' => 'delete', $powers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $powers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

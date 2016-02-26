<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modifier'), ['action' => 'edit', $modifier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modifier'), ['action' => 'delete', $modifier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modifiers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifier Classes'), ['controller' => 'ModifierClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier Class'), ['controller' => 'ModifierClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifier Types'), ['controller' => 'ModifierTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier Type'), ['controller' => 'ModifierTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifier Values'), ['controller' => 'ModifierValues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier Value'), ['controller' => 'ModifierValues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modifiers view large-9 medium-8 columns content">
    <h3><?= h($modifier->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($modifier->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Display') ?></th>
            <td><?= $modifier->has('display') ? $this->Html->link($modifier->display->name, ['controller' => 'Displays', 'action' => 'view', $modifier->display->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modifier Class') ?></th>
            <td><?= $modifier->has('modifier_class') ? $this->Html->link($modifier->modifier_class->name, ['controller' => 'ModifierClasses', 'action' => 'view', $modifier->modifier_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modifier Type') ?></th>
            <td><?= $modifier->has('modifier_type') ? $this->Html->link($modifier->modifier_type->name, ['controller' => 'ModifierTypes', 'action' => 'view', $modifier->modifier_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($modifier->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lock Level') ?></th>
            <td><?= $this->Number->format($modifier->lock_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($modifier->sort_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($modifier->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($modifier->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Required') ?></th>
            <td><?= $modifier->required ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Modifier Values') ?></h4>
        <?php if (!empty($modifier->modifier_values)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Lock Level') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Modifier Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modifier->modifier_values as $modifierValues): ?>
            <tr>
                <td><?= h($modifierValues->id) ?></td>
                <td><?= h($modifierValues->name) ?></td>
                <td><?= h($modifierValues->lock_level) ?></td>
                <td><?= h($modifierValues->value) ?></td>
                <td><?= h($modifierValues->modifier_id) ?></td>
                <td><?= h($modifierValues->created) ?></td>
                <td><?= h($modifierValues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ModifierValues', 'action' => 'view', $modifierValues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ModifierValues', 'action' => 'edit', $modifierValues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ModifierValues', 'action' => 'delete', $modifierValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifierValues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sections') ?></h4>
        <?php if (!empty($modifier->sections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Target Id') ?></th>
                <th><?= __('Section Type Id') ?></th>
                <th><?= __('Modifier Id') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modifier->sections as $sections): ?>
            <tr>
                <td><?= h($sections->id) ?></td>
                <td><?= h($sections->target_id) ?></td>
                <td><?= h($sections->section_type_id) ?></td>
                <td><?= h($sections->modifier_id) ?></td>
                <td><?= h($sections->active) ?></td>
                <td><?= h($sections->created) ?></td>
                <td><?= h($sections->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

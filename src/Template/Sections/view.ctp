<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Section'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targets'), ['controller' => 'Targets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Target'), ['controller' => 'Targets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Section Types'), ['controller' => 'SectionTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section Type'), ['controller' => 'SectionTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sections view large-9 medium-8 columns content">
    <h3><?= h($section->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Target') ?></th>
            <td><?= $section->has('target') ? $this->Html->link($section->target->name, ['controller' => 'Targets', 'action' => 'view', $section->target->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Section Type') ?></th>
            <td><?= $section->has('section_type') ? $this->Html->link($section->section_type->name, ['controller' => 'SectionTypes', 'action' => 'view', $section->section_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modifier') ?></th>
            <td><?= $section->has('modifier') ? $this->Html->link($section->modifier->name, ['controller' => 'Modifiers', 'action' => 'view', $section->modifier->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($section->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($section->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($section->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $section->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

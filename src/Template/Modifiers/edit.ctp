<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $modifier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $modifier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Modifiers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifier Classes'), ['controller' => 'ModifierClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier Class'), ['controller' => 'ModifierClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifier Types'), ['controller' => 'ModifierTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier Type'), ['controller' => 'ModifierTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifier Values'), ['controller' => 'ModifierValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier Value'), ['controller' => 'ModifierValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modifiers form large-9 medium-8 columns content">
    <?= $this->Form->create($modifier) ?>
    <fieldset>
        <legend><?= __('Edit Modifier') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('locklevel');
            echo $this->Form->input('required');
            echo $this->Form->input('display_id', ['options' => $displays, 'empty' => true]);
            echo $this->Form->input('modifier_class_id', ['options' => $modifierClasses, 'empty' => true]);
            echo $this->Form->input('modifier_type_id', ['options' => $modifierTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

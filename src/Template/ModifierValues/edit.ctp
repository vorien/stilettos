<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $modifierValue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $modifierValue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Modifier Values'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modifierValues form large-9 medium-8 columns content">
    <?= $this->Form->create($modifierValue) ?>
    <fieldset>
        <legend><?= __('Edit Modifier Value') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('locklevel');
            echo $this->Form->input('value');
            echo $this->Form->input('required');
            echo $this->Form->input('modifier_id', ['options' => $modifiers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

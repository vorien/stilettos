<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $modifierClass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $modifierClass->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Modifier Classes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modifierClasses form large-9 medium-8 columns content">
    <?= $this->Form->create($modifierClass) ?>
    <fieldset>
        <legend><?= __('Edit Modifier Class') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $display->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $display->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="displays form large-9 medium-8 columns content">
    <?= $this->Form->create($display) ?>
    <fieldset>
        <legend><?= __('Edit Display') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('sort_order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<!-- File: templates/Articles/view.php -->

<h1><?= h($msds->title) ?></h1>
<p><?= h($msds->body) ?></p>
<p><small>Created: <?= $msds->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $msds->slug]) ?></p>
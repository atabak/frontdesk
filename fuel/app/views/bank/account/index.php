<div class="row">
	<div class="col-md-6">
		<h2>Listing <span class='text-muted'>Bank Accounts</span></h2>
	</div>

	<div class="col-md-6">
		<br>
		<?= Html::anchor('bank/account/create', '<i class="fa fa-plus"></i>&ensp;Account', array('class' => 'btn btn-primary pull-right')); ?>
	</div>
</div>
<hr>

<?php if ($bank_accounts): ?>
<table class="table table-bordered table-hover table-striped datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Account number</th>
			<th>Financial institution</th>
			<th>Last statement date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bank_accounts as $item): ?>
		<tr>
			<td><?= $item->name; ?></td>
			<td><?= $item->account_number; ?></td>
			<td><?= $item->financial_institution; ?></td>
			<td><?= $item->last_statement_date; ?></td>
			<td class="text-center">
				<!-- <?php // Html::anchor('bank/account/view/'.$item->id, '<i class="fa fa-eye fa-fw fa-lg"></i>'); ?> -->
				<?= Html::anchor('bank/account/edit/'.$item->id, '<i class="fa fa-edit fa-fw fa-lg"></i>'); ?>
				<?= Html::anchor('bank/account/delete/'.$item->id, '<i class="fa fa-trash-o fa-fw fa-lg"></i>', array('class' => 'text-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>
<p>No Bank accounts.</p>
<?php endif; ?>

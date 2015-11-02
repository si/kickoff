<h1>Style Guide</h1>

<h2>Introduction</h2>

<p>This guide sets out to demonstrate how Kick Off content is presented in it's many forms, initially online (web) then into other formats (plain text or code).</p>

<h2>Organising elements</h2>

<p>Always consider how to group content together in the most <em>semantic</em> way possible. This could consist of <strong>paragraphs</strong>, <strong>un-ordered lists</strong>, <strong>ordered lists</strong> or <strong>tables</strong>.</p>

<h3>Paragraphs</h3>
<p>Paragraphs should be used sparingly on Kick Off as users tend to glance over them. </p>

<h3>Un-ordered lists</h3>
<ul>
	<li>List items show concise information that are easily digestable.</li>
	<li>They are best used to present multiple relative items, no more than a few lines long.</li>
	<li>These items don't have any particular emphasis on order, hence why they are in an <em>un-ordered list</em>.</li>
</ul>

<h3>Ordered lists</h3>
<ul>
	<li>Only use ordered lists when sequential order is required.</li>
	<li>Did we really need to apply it to this?</li>
	<li>Are you sure?</li>
</ul>

<h3>Tables</h3>
<p>When working with data, tables are often a suitable option as they group information in organised and semantic ways. Consider the following…</p>
<style>

th[colspan] {
	opacity: 0.3;
}
th[rowspan] {
	vertical-align: bottom;
}

@media (max-width: 50em) {
	.table__column-4 {
		display: none;
	}
}
@media (max-width: 40em) {
	.table__column-4,
	.table__column-3 {
		display: none;
	}
}
@media (max-width: 30em) {
	.table__column-4,
	.table__column-3,
	.table__column-2 {
		display: none;
	}
}
</style>
<table>
	<thead>
		<tr>
			<th rowspan="2" class="table__column-1">Position</th>
			<th rowspan="2" class="table__column-1">Team</th>
			<th rowspan="2" class="table__column-2">Played</th>
			<th colspan="3" class="table__column-3">Results</th>
			<th colspan="2" class="table__column-4">Goals</th>
			<th rowspan="2" class="table__column-1">Points</th>
		</tr>
		<tr>
			<th class="table__column-3">Won</th>
			<th class="table__column-3">Drew</th>
			<th class="table__column-3">Lost</th>
			<th class="table__column-4">For</th>
			<th class="table__column-4">Against</th>
		</tr>
	</thead>
<?php 
$table = array(
	array(
		'team' => 'Chelsea',
		'played' => 38,
		'won' => 25,
		'draw' => 7,
		'lost' => 6,
		'for' => 87,
		'against' => 23,
		'points' => 82
	),
	array(
		'team' => 'Manchester City',
		'played' => 38,
		'won' => 23,
		'draw' => 7,
		'lost' => 8,
		'for' => 77,
		'against' => 21,
		'points' => 76
	),
	array(
		'team' => 'Manchester United',
		'played' => 38,
		'won' => 22,
		'draw' => 8,
		'lost' => 8,
		'for' => 73,
		'against' => 29,
		'points' => 74
	),
	array(
		'team' => 'Liverpool',
		'played' => 38,
		'won' => 20,
		'draw' => 9,
		'lost' => 9,
		'for' => 71,
		'against' => 23,
		'points' => 69
	),
	array(
		'team' => 'Tottenham Hotspurs',
		'played' => 38,
		'won' => 20,
		'draw' => 8,
		'lost' => 10,
		'for' => 71,
		'against' => 28,
		'points' => 68
	),
);
?>
	<tbody>
	<?php foreach($table as $position => $data) : ?>
		<tr>
			<td class="table__column-1"><?php echo $position+1; ?></td>
			<td class="table__column-1"><?php echo $data['team']; ?></td>
			<td class="table__column-2"><?php echo $data['played']; ?></td>
			<td class="table__column-3"><?php echo $data['won']; ?></td>
			<td class="table__column-3"><?php echo $data['draw']; ?></td>
			<td class="table__column-3"><?php echo $data['lost']; ?></td>
			<td class="table__column-4"><?php echo $data['for']; ?></td>
			<td class="table__column-4"><?php echo $data['against']; ?></td>
			<td class="table__column-1"><?php echo $data['points']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<h2>Listing Courses</h2>
<br>
<?php if ($courses): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Course id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($courses as $course): ?>		<tr>

			<td><?php echo $course->name; ?></td>
			<td><?php echo $course->category; ?></td>
			<td><?php echo $course->course_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/course/view/'.$course->id, 'View'); ?> |
				<?php echo Html::anchor('admin/course/edit/'.$course->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/course/delete/'.$course->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Courses.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/course/create', 'Add new Course', array('class' => 'btn success')); ?>

</p>

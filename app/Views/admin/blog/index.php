<?= $this->extend('admin/layouts/main');?>
<?= $this->section('content');?>

<div class="container-fluid">
	<div class="row">
	<?php foreach ($posts as $key => $post) {?>
		<?= view_cell('App\Libraries\Blog::postItem', ['title_post' => $post, 'number_img' => $key+1])?>
	<?php } ?>
	</div>
</div>

<?= $this->endSection(); ?>
<div class="container roomy-40">

    <hgroup class="mb20">
		<h1>Search Results</h1>
		<?php $new = str_replace('%20', ' ', $this->uri->segment(2)); ?>
		<h2 class="lead"><strong class="text-danger"><?=$num_rows;?></strong> results were found for the search for <strong class="text-danger"><?=$new;?></strong></h2>								
	</hgroup>

	<?php foreach ($data as $v) { ?>
	<div class="search-result row">
		<div class="col-md-2">
			<ul class="meta-search">
				<li><i class="fa fa-calendar"></i> <span><?=$v->created_at;?></span></li>
				<li><i class="fa fa-tags"></i> <span><?=$v->keywords;?></span></li>
			</ul>
		</div>
		<div class="col-md-10">
			<h3><a href="#" title=""><?=$v->judul;?></a></h3>
			<p><?=substr($v->deskripsi, 0, 700);?></p>						
            <a href="<?=base_url().'belajar-pajak/'.$v->slug;?>" class="btn btn-primary" title="Lorem ipsum"> Baca Selengkapnya</a>
		</div>
	</div>
	<?php } ?>
</div>
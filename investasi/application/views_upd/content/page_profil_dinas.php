
<style>
	.text-field ul{
		list-style-type:square;
	}
</style>
<div class="text_field">
	<img width="300" src="<?=base_url().'repository/foto/konten/'.$row->gambar?>" />
	<div id='kont'>
		<?=$recordisi?>
	</div>
	<br>
	<?php
		if($param_chart == 'Y'){
	?>
			<div class="csstable" id="table_na">
			
			</div>
			<br />
			<div id='charttable'></div>
	<?php
		}
	?>
</div>

<?php
	if($param_chart == 'Y'){
?>
<script>
	var type_chart='<?=$chart->tipe_chart?>';
	$('#table_na').addClass('loading').html('');
	$('#charttable').addClass('loading').html('');
	$.post(host+'home/getchart/<?=$chart->nama_table?>/',{menu_id:<?=$menu_id?>,multi:'<?=$chart->multi_chart?>'},function(r){
		var x=JSON.parse(r);
		/*var data_bar = [];
		for (var prop_name in x.bar) {
			data_bar.push([prop_name, x.bar[prop_name]])
		}
		color = ['#970000'];
		bar_chart('charttable',data_bar,'',"<?=$chart->code_number?>",'','',color,'Tahun','<?=$chart->nama_yaxis?>');
		*/
		$('#charttable').removeClass('loading');
		$('#table_na').removeClass('loading').html(x.table);
		chart_na('charttable',"<?=$chart->tipe_chart?>","<?=$chart->nama_xaxis?>",'',"<?=$chart->nama_yaxis?>",x.x,x.y,"<?=$chart->code_number?>");
		
	});
</script>
<?php
	}
?>

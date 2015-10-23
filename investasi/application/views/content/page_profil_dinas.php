
<style>
	.text-field ul{
		list-style-type:square;
	}
</style>
<div class="text_field">
	<div id='kont' style='padding-left:10px;padding-right:10px;'>
		<?=$recordisi?>
	</div><br>
	<?=$pendukung;?>
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
	var menu_id_na=<?=$menu_id?>;
	$('#table_na').addClass('loading').html('');
	$('#charttable').addClass('loading').html('');
	$.post(host+'home/getchart/<?=$chart->nama_table?>/',{menu_id:<?=$menu_id?>,multi:'<?=$chart->multi_chart?>'},function(r){
		var x=JSON.parse(r);
		$('#charttable').removeClass('loading');
		$('#table_na').removeClass('loading').html(x.table);
		chart_na('charttable',"<?=$chart->tipe_chart?>","<?=$chart->nama_xaxis?>",'',"<?=$chart->nama_yaxis?>",x.x,x.y,"<?=$chart->code_number?>");
		
	});
	switch(menu_id_na){
		case 5:
			$.post(host+'home/getchart/tbl_pertumbuhan_penduduk/',{menu_id:<?=$menu_id?>,multi:'<?=$chart->multi_chart?>'},function(r){
				var x=JSON.parse(r);
				chart_na('chart_tambahan',"column","Pertumbuhan Penduduk",'',"",x.x,x.y,"");
				
			});
		break;
		case 17:
			var ser
			$.post(host+'home/getchart/tbl_rata2_ekonomi/',{menu_id:<?=$menu_id?>,multi:'<?=$chart->multi_chart?>'},function(r){
				
				var x=JSON.parse(r);
					var data_bar = [];
					for (var prop_name in x.bar) {
						data_bar.push([prop_name, x.bar[prop_name]])
					}
				console.log(data_bar);
				ser=[{
					type: 'pie',
					name: 'Pertumbuhan Ekonomi',
					data: data_bar
				}];
				
				chart_na('chart_tambahan',"pie","Rata-rata Pertumbuhan Ekonomi Per KabKota",'',"",'',ser,"");
				
			});
		break;
		
	}

</script>
<?php
	}
?>

var frmHeight=getClientHeight();
var frmWidth=getClientWidth();

function getClientHeight(){
	var theHeight;

	if (window.innerHeight) {
		theHeight=window.innerHeight;
	}
	else if (document.documentElement && document.documentElement.clientHeight) {
		theHeight=document.documentElement.clientHeight;
	}
	else if (document.body) {
		theHeight=document.body.clientHeight;
	}
	
	return theHeight;
}

function getClientWidth(){
	var theWidth;
	if (window.innerWidth) 
		theWidth=window.innerWidth;
	else if (document.documentElement && document.documentElement.clientWidth) 
		theWidth=document.documentElement.clientWidth;
	else if (document.body) 
		theWidth=document.body.clientWidth;

	return theWidth;
}

function loadUrl(obj,url,judul,desc){
	var urls=host+url;
	//$.blockUI({ css: {backgroundColor: '#DF4E49', color: '#fff'}, message: '<h3> <img src="'+host+'assets/images/loading-oi.gif" /> Harap Tunggu...</h3>', baseZ: 10000 });
	load_na('show');
    $("#page").html("").addClass("loading");
	$.get(urls,function (html){
	    $("#page").html(html).removeClass("loading");
		$('#judul_na').html(judul);
		//$.unblockUI();
		load_na('hide');
    });
}

function blokuinya(parcok){
	if(parcok == 'add'){
		$.blockUI({ css: {backgroundColor: '#DF4E49', color: '#fff'}, message: '<h3> <img src="'+host+'assets/images/loading-oi.gif" /> Harap Tunggu...</h3>', baseZ: 10000 });
	}else{
		$.unblockUI();
	}
}

function submitform1(frm,func){
    var url = $('#'+frm).attr("action");
	//$.blockUI({ css: {backgroundColor: '#DF4E49', color: '#fff'}, message: '<h3> <img src="'+host+'assets/images/loading-oi.gif" /> Harap Tunggu...</h3>', baseZ: 10000 });
    $('#'+frm).form('submit',{
            url:url,
            onSubmit: function(){
                  return $(this).form('validate');
            },
            success:function(data){
				if (func == undefined ){
                     if (data == "1"){
                        alert('Data Sudah Disimpan ');
						//$.unblockUI();
                    }else{
                         alert('Data Gagal Tersimpan');
						 //$.unblockUI();
                    }
                }else{
                    func(data);
					//$.unblockUI();
                }
            },
            error:function(data){
				if (func == undefined ){
                     alert('Data Gagal Tersimpan');
					 //$.unblockUI();
                }else{
                    func(data);
					//$.unblockUI();
                }
            }
    });
}

function submitform(frm,func){
 var url = $('#'+frm).attr("action");
 var a=$('#'+frm).serialize();
	$.ajax({
		type:'post',
		url:url,
		data:a,
		beforeSend:function(){
			//launchpreloader();
		},
		complete:function(){
		   // stopPreloader();
		},
		success:function(data){
			  if (func == undefined ){
                     if (data == "1"){
                        pesan('Data Saved ','Success');
                    }else{
                         pesan(data,'Result');
                    }
                }else{
                    func(data);
                }
		},
		error:function(data){
                 if (func == undefined ){
                     pesan(data,'Error');
                }else{
                    func(data);
                }
            }
	});
}

function bar_chart(id,data,xseries,formatnya,tickser,judul,colors,xjudul,yjudul){
	//alert(formatnya);
	plot1 = $.jqplot(id, [data], {
	 animate: true,
        // Will animate plot on calls to plot1.replot({resetAxes:true})
     animateReplot: true,
	 
    title: (judul == undefined ? "" : judul),
	seriesColors : colors,	
    series: [{renderer:$.jqplot.BarRenderer,pointLabels: {show: true}}],
    axesDefaults: {
        tickRenderer: $.jqplot.CanvasAxisTickRenderer 
    },
		axes: {
		  xaxis: {
			renderer: $.jqplot.CategoryAxisRenderer,
			ticks: tickser,
			label:(xjudul == undefined ? "" : xjudul)
		  },
		  
		  yaxis: {
                tickOptions: {
                    formatString: (formatnya == undefined ? "%'d" : formatnya)
                },
                rendererOptions: {
                    forceTickAt0: true
                },
				labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
				label:(yjudul == undefined ? "" : yjudul)
            },
		},
	
	});
	
}

function chart_na(id_selector,type,title,subtitle,title_y,data_x,data_y,satuan){
	switch(type){
	case "column":
	case "line" :
	$('#'+id_selector).highcharts({
            chart: {
                type: type
            },
            title: {
                text: title
            },
            subtitle: {
                text: subtitle
            },
            xAxis: {
                categories: data_x
            },
            yAxis: {
                min: 0,
                title: {
                    text: title_y
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} '+satuan+'</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: data_y
        });
		break;
		case "pie":
			 $('#'+id_selector).highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: title
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: data_y
			});
		break;
	}
}

function windowLoading(html,judul,width,height){
    divcontainerz = "win"+Math.floor(Math.random()*9999);
    $("<div id="+divcontainerz+"></div>").appendTo("body");
    divcontainerz = "#"+divcontainerz;
    $(divcontainerz).html(html);
    $(divcontainerz).css('padding','5px');
    $(divcontainerz).window({
       title:judul,
       width:width,
       height:height,
       autoOpen:false,
       modal:true,
       maximizable:false,
       resizable:false,
       minimizable:false,
       closable:false,
       collapsible:false 
    });
    $(divcontainerz).window('open');        
}
function winLoadingClose(){
    $(divcontainerz).window('close');
    //$(divcontainer).html('');
}
function loadingna(){
	windowLoading("<img src='"+host+"assets/images/loading.gif' style='position: fixed;top: 50%;left: 50%;margin-top: -10px;margin-left: -25px;'/>","Please Wait",200,100);
}

var container3;
function window_na(html,judul,width,height){
    container3 = "win"+Math.floor(Math.random()*9999);
    $("<div id="+container3+"></div>").appendTo("body");
    container3 = "#"+container3;
    $(container3).html(html);
    $(container3).css('padding','5px');
    $(container3).window({
       title:judul,
       width:width,
       height:height,
       autoOpen:false,
       maximizable:false,
       minimizable: false,
	   collapsible: false,
       resizable: false,
       closable:true,
       modal:true,
	   onBeforeClose:function(){	   
			$(container3).window("close",true);
			$(container3).remove();
			//$(container3).window("destroy",true);
	   }
    });
    $(container3).window('open');        
}
function window_na_close(){
	$(container3).html('');
    $(container3).window('close');
	//$(container3).window("destroy",true);
   
}

function load_na(sts){
	if(sts=='show') $('#loading-status').show();
	else $('#loading-status').hide();
}

function formatDate(date) {
				var bulan=date.getMonth() +1;
				var tgl=date.getDate();
				if(bulan < 10){
					bulan='0'+bulan;
				}
				
				if(tgl < 10){
					tgl='0'+tgl;
				}
	        	return date.getFullYear() + "-" + bulan + "-" + tgl;
}		

function fillCombo(url, SelID, value, value2, value3, value4){
	if (value == undefined) value = "";
	if (value2 == undefined) value2 = "";
	if (value3 == undefined) value3 = "";
	if (value4 == undefined) value4 = "";
	
	$('#'+SelID).empty();
	$.post(url, {"v": value, "v2": value2, "v3": value3, "v4": value4},function(data){
		$('#'+SelID).append(data);
	});

}

function MadFileBrowser(field_name, url, type, win) {
	  tinyMCE.activeEditor.windowManager.open({
	      file : host+"assets/filemanager/mfm.php?field=" + field_name + "&url=" + url + "",
	      title : 'File Manager',
	      width : 640,
	      height : 450,
	      resizable : "no",
	      inline : "yes",
	      close_previous : "no"
	  }, {
	      window : win,
	      input : field_name
	  });
	  return false;
	}



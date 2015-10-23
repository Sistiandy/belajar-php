function msglogin() {
	$.msgBox({
		title: "Warning",
		content: "Silahkan login terlebih dahulu.",
		type: "warn",
		buttons: [{ value: "Ok" }],
		success: function (result) {
			$("#username").focus();
		}
	});
}

tinyMCE.init({
	// General options
	mode : "textareas",
	editor_selector : "thread_content",
	theme : "modern",
	skin : "lightgray",
	skin_variant : "red",
	plugins : "autolink,lists,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template,autosave",
	//plugins : "advlist,anchor,autolink,autoresize,autosave,bbcode,charmap,code,compat3x,contextmenu,directionality,emoticons,example,example_dependency,fullpage,fullscreen,hr,image,importcss,insertdatetime,layer,legacyoutput,link,lists,media,nonbreaking,noneditable,pagebreak,paste,preview,print,save,searchreplace,spellchecker,tabfocus,table,template,textcolor,visualblocks,visualchars,wordcount",
	// Theme options
	theme_advanced_buttons1 : "fullscreen,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,code,|,forecolor,backcolor",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing: true,
	theme_advanced_resizing_use_cookie : false,

	// Example content CSS (should be your site CSS)
	content_css : "tinymce/css/content.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "tinymce/lists/template_list.js",
	external_link_list_url : "tinymce/lists/link_list.js",
	external_image_list_url : "tinymce/lists/image_list.js",
	media_external_list_url : "tinymce/lists/media_list.js",
	
	convert_urls: false,
});
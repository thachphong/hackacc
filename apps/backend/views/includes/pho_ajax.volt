<style type="text/css">
.modal_loading {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('{{url.get("templateadm/image/")}}loading.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading {
    overflow: hidden;   
}
/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal_loading {
    display: block;
}
</style>
<script type="text/javascript">
var Pho_message_box = function (title, msg, closed_func, style) { //Edit NBKD-1107 - Tin-VNIT - 2015/06/24
	modal({
		type: 'info',
		title: title,
		text: msg,
		size:'normal',      
        closeClick: false,
        closable: true, 
        callback: function() {
					if(closed_func){
                        closed_func();
                    }
				}
	});
};

var Pho_message_box_error = function (title, msg, closed_func, style) { 
	modal({
		type: 'error',
		title: title,
		text: msg,
		size:'normal',      
        closeClick: false,
        closable: true, 
        callback: function() {
					if(closed_func){
                        closed_func();
                    }
		}
        
	});
};
var Pho_json_ajax= function (type,url,data,done_fun){
    $.ajax({
		url: url,
		data: data,
	    dataType: 'json',
		success: function(data) {
		    done_fun(data);
		},
		error: function() {
			Pho_message_box_error('Lỗi','Lỗi Ajax !!!');
		},
		type: type
	});
};
var Pho_html_ajax= function (type,url,data,done_fun){
    $.ajax({
		url: url,
		data: data,
	    dataType: 'html',
		success: function(data) {
		    done_fun(data);
		},
		error: function() {
			Pho_message_box_error('Lỗi','Lỗi Ajax !!!');
		},
		type: type
	});
};
$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }    
});
</script>
<div class="modal_loading"></div>

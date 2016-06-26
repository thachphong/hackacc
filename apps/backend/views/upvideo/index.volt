<div class="row">
<div class="col-md-8" >
<h2>Đăng Video Mới</h2>
	
		<span>{{message}}</span>
	
	<form role="form" id="form_upload" action="" method="POST" enctype="multipart/form-data">
	<!--<form role="form" action="{$baseurl}upload/up_image" method="POST" enctype="multipart/form-data">-->
      	<div class="form-group">
		      <label for="title">Tiêu Đề</label>
		      <input type="text"  class="form-control" id="title" name="title" placeholder="Tiêu Đề" value="" >
		      <h6 id="title_eror" class="color_red"></h6>
		</div>
		<div class="form-group">
		      <label for="resource">Link video từ Youtube </label>
		      <input type="text" class="form-control" id="url_link" name="url_link" placeholder="Link video từ Youtube" value="" >
		      <h6 id="url_link_eror" class="color_red"></h6>
		</div>
		<!--<div class="form-group">
			<input type="file" id="imgInp" title="Chọn Ảnh ..." name="src_image"> 
			 <h6 id="imgInp_eror" class="color_red"></h6>
		</div>
		<div class="form-group">
			<img id="blah" class="show_image_input" src="#" alt="Ảnh của bạn" style="width: 300px; display: none"  /> 
		</div>-->		
    	<div class="form-group" style=" text-align: center">
		    <button type="submit" id="btn_upload" class="btn btn-success" name="submit">Đăng</button>
		</div>
	</form>
</div>
</div>

<script>

$(document).ready(function(){	
	$(document).on('click','#btn_upload',function(){
        var arr = $('#form_upload').serializeArray();
        Pho_json_ajax('POST',"{{url.get('upvideo/upload')}}" ,arr,function(data){
        	console.log(data);
            if(data.status =='OK'){
            	console.log(data);
                Pho_message_box('Thông báo',data.message);/*,function(){
                	//$('.selected').click();
                }*/ 
            }else{
                Pho_message_box_error('Lỗi',data.message);
            }
        });
    });
	
});	

</script>
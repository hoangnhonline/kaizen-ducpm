@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sản phẩm    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
      <li class="active">Cập nhật</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('product.update') }}" id="dataForm">
      <input type="hidden" name="id" value="{{ $detail->id }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cập nhật</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}          
            <div class="box-body">
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" data-editor="vi" class="tab_editor" aria-controls="home" role="tab" data-toggle="tab">Thông tin sản phẩm</a></li>                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">                        
                          
                        <div class="form-group" >                  
                          <label>Tên tiếng Việt <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="name_vi" id="name_vi" value="{{ old('name_vi', $detail->name_vi) }}">
                        </div>
                        <div class="form-group" >                  
                          <label>Tên tiếng Anh <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="name_en" id="name_en" value="{{ old('name_en', $detail->name_en) }}">
                        </div>
                        <!-- <div class="form-group" >                  
                          <label>Tên tiếng Trung <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="name_cn" id="name_cn" value="{{ old('name_cn', $detail->name_cn) }}">
                        </div> -->                                               
                        <div class="form-group">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_hot" value="1" {{ old('is_hot', $detail->is_hot) == 1 ? "checked" : "" }}> Hiện trang chủ </label>
                          </div>                          
                        </div>   
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                          <label class="col-md-3 row">Ảnh thumbnail (390 x 220px)</label>    
                          <div class="col-md-9">
                            <img id="thumbnail_image" src="{{ $detail->image_url ? Helper::showImage($detail->image_url ) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="145" >
                         
                            <button class="btn btn-default btn-sm btnSingleUpload" data-set="image_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                          </div>
						              <input type="hidden" name="image_url" id="image_url" value="{{ old('image_url', $detail->image_url) }}"/>
                          <div style="clear:both"></div>
                        </div> 
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                          <label class="col-md-3 row">Ảnh chi tiết (0 x 350px)</label>    
                          <div class="col-md-9">
                            <img id="thumbnail_image_2" src="{{ $detail->image_url_2 ? Helper::showImage($detail->image_url_2 ) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail"  height="80">
                         
                            <button class="btn btn-default btn-sm btnSingleUpload" data-set="image_url_2" data-image="thumbnail_image_2" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                          </div>
                          <input type="hidden" name="image_url_2" id="image_url_2" value="{{ old('image_url_2', $detail->image_url_2) }}"/>
                          <div style="clear:both"></div>
                        </div>                                                               
                         <div class="form-group">
                          <label>Chi tiết tiếng Việt</label>
                          <textarea class="form-control" rows="10" name="content_vi" id="content_vi">{{ old('content_vi', $detail->content_vi) }}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Chi tiết tiếng Anh</label>
                          <textarea class="form-control" rows="10" name="content_en" id="content_en">{{ old('content_en', $detail->content_en) }}</textarea>
                        </div>
                        <!-- <div class="form-group">
                          <label>Chi tiết tiếng Trung</label>
                          <textarea class="form-control" rows="10" name="content_cn" id="content_cn">{{ old('content_cn', $detail->content_cn) }}</textarea>
                        </div> -->
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                     
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave" onclick="return validateData(); ">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('product.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     
<input type="hidden" id="editor_active" value="vi" />
      </div>
      <div class="col-md-4">      
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>

          <!-- /.box-header -->
            <div class="box-body">

               <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#seoVi" aria-controls="seoVi" role="tab" data-toggle="tab">VN</a></li>
                    <li role="presentation"><a href="#seoEn" aria-controls="seoEn" role="tab" data-toggle="tab">EN</a></li>  
                    <!-- <li role="presentation"><a href="#seoCn" aria-controls="seoCn" role="tab" data-toggle="tab">CN</a></li>  -->                   
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <input type="hidden" name="meta_id" value="{{ $detail->meta_id }}">
                    <div role="tabpanel" class="tab-pane active" id="seoVi">
                         <div class="form-group">
                            <label>Thẻ title </label>
                            <input type="text" class="form-control" name="meta_title_vi" id="meta_title_vi" value="{{ old('meta_title_vi', $meta->title_vi) }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Thẻ desciption</label>
                            <textarea class="form-control" rows="4" name="meta_description_vi" id="meta_description_vi">{{ old('meta_description_vi', $meta->description_vi) }}</textarea>
                          </div>  
                          <div class="form-group">
                            <label>Nội dung tùy chỉnh</label>
                            <textarea class="form-control" rows="4" name="custom_text_vi" id="custom_text_vi">{{ old('custom_text_vi', $meta->custom_text_vi) }}</textarea>
                          </div>
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="seoEn">                        
                        <div class="form-group">
                            <label>Meta title </label>
                            <input type="text" class="form-control" name="meta_title_en" id="meta_title_en" value="{{ old('meta_title_en', $meta->title_en) }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Meta desciption</label>
                            <textarea class="form-control" rows="4" name="meta_description_en" id="meta_description_en">{{ old('meta_description_en', $meta->description_en) }}</textarea>
                          </div> 
                          <div class="form-group">
                            <label>Custom text</label>
                            <textarea class="form-control" rows="4" name="custom_text_en" id="custom_text_en">{{ old('custom_text_en', $meta->custom_text_en) }}</textarea>
                          </div>
                    </div><!--end thong tin co ban-->
                    <!-- <div role="tabpanel" class="tab-pane" id="seoCn">                        
                        <div class="form-group">
                            <label>Meta title </label>
                            <input type="text" class="form-control" name="meta_title_cn" id="meta_title_cn" value="{{ old('meta_title_cn', $meta->title_cn) }}">
                          </div>
                          
                          <div class="form-group">
                            <label>Meta desciption</label>
                            <textarea class="form-control" rows="4" name="meta_description_cn" id="meta_description_cn">{{ old('meta_description_cn', $meta->description_cn) }}</textarea>
                          </div> 
                          <div class="form-group">
                            <label>Custom text</label>
                            <textarea class="form-control" rows="4" name="custom_text_cn" id="custom_text_cn">{{ old('custom_text_cn', $meta->custom_text_cn) }}</textarea>
                          </div>
                    </div> --><!--end thong tin co ban--> 
                   
                  </div>

                </div>


             
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
 <input type="hidden" name="image_pro" id="image_pro" value="{{ old('image_pro') }}"/> 
 <input type="hidden" name="pro_name" id="pro_name" value="{{ old('pro_name') }}"/>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #28AA4A !important;
  }

</style>
@stop
@section('javascript_page')
<script type="text/javascript">
$(document).on('click', '.remove-image', function(){
  if( confirm ("Bạn có chắc chắn không ?")){
    $(this).parents('.col-md-3').remove();
  }
});
function validateData(){
  if($('#loai_id').val() == 0){
    alert('Chưa chọn danh mục cha.'); return false;
  } 
  return true;  
}
    $(document).ready(function(){
      $('.tab_editor').click(function(){
        var active = $(this).attr('data-editor');
        $('#editor_active').val(active);
      });
      $('#loai_id').change(function(){
        var loai_id = $(this).val();
        
        $.ajax({
              url: "{{ route('cate.ajax-list-by-parent') }}",
              type: "POST",
              async: false,      
              data: {
                loai_id : loai_id
              },              
              success: function (response) {
                $('#cate_id').html(response);              
              }              
            });
      });
      $(".select2").select2();
      $('#dataForm').submit(function(){
        
        if( $('#loai_id').val() == 0){
          swal("Lỗi!", "Chưa chọn danh mục cha", "error");
          return false;
        }       
        
        $('#btnSave').hide();
        $('#btnLoading').show();
      });
      var editor = CKEDITOR.replace( 'content_vi',{
          language : 'vi',
          height: 300,
        
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}"
      });
      var editor2 = CKEDITOR.replace( 'content_en',{
          language : 'vi',
          height: 300,
        
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}"
      });
      var editor2 = CKEDITOR.replace( 'content_cn',{
          language : 'vi',
          height: 300,
    
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}"
      });
      
      $('#btnUploadImage').click(function(){        
        $('#file-image').click();
      }); 
     
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file[]', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image_multiple').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#div-image').append(response);
                if( $('input.thumb:checked').length == 0){
                  $('input.thumb').eq(0).prop('checked', true);
                }
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
     

      $('#name_vi').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' ){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug_vi').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      });
      $('#name_en').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' ){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug_en').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      }); 
    });
    
</script>
@stop

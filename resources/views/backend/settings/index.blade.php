@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cài đặt site
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('settings.index') }}">Cài đặt</a></li>
      <li class="active">Cập nhật</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">   
    <form role="form" method="POST" action="{{ route('settings.update') }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
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
              @if(Session::has('message'))
              <p class="alert alert-info" >{{ Session::get('message') }}</p>
              @endif
                 <!-- text input -->
                <div class="form-group">
                  <label>Tên site VI<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="site_name_vi" id="site_name_vi" value="{{ $settingArr['site_name_vi'] }}">
                </div>
                <div class="form-group">
                  <label>Tên site EN<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="site_name_en" id="site_name_en" value="{{ $settingArr['site_name_en'] }}">
                </div>
                
                <div class="form-group">
                  <label>Facebook Fanpage</label>
                  <input type="text" class="form-control" name="facebook_fanpage" id="facebook_fanpage" value="{{ $settingArr['facebook_fanpage'] }}">
                </div>
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $settingArr['instagram'] }}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ $settingArr['email'] }}">
                </div>
                <div class="form-group">
                  <label>Điện thoại</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ $settingArr['phone'] }}">
                </div>                
                <div class="form-group">
                  <label>Code google analystic </label>
                  <input type="text" class="form-control" name="google_analystic" id="google_analystic" value="{{ $settingArr['google_analystic'] }}">
                </div>   
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Logo </label>    
                  <div class="col-md-9">
                    <img id="thumbnail_logo" src="{{ $settingArr['logo'] ? Helper::showImage($settingArr['logo']) : URL::asset('admin/dist/img/img.png') }}" class="img-logo" width="150" >
                    
                    <input type="file" id="file-logo" style="display:none" />
                 
                    <button class="btn btn-default btnSingleUpload" data-image="thumbnail_logo" data-set="logo" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    <input type="hidden" name="logo" id="logo" value="{{ $settingArr['logo'] }}"/>
                  </div>
                  <div style="clear:both"></div>
                </div>                
                <div style="clear:both"></div> 
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Banner ( og:image ) </label>    
                  <div class="col-md-9">
                    <img id="thumbnail_banner" src="{{ $settingArr['banner'] ? Helper::showImage($settingArr['banner']) : URL::asset('admin/dist/img/img.png') }}" class="img-banner" width="200">
                    
                    <input type="file" id="file-banner" style="display:none" />
                 
                    <button class="btn btn-default btnSingleUpload" data-set="banner_url" data-image="thumbnail_banner"  type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    <input type="hidden" name="banner" id="banner" value="{{ $settingArr['banner'] }}"/>
                  </div>
                  <div style="clear:both"></div>
                </div>
                <div style="clear:both"></div>            
                 
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>         
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
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
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="seoVi">
                         <div class="form-group">
                            <label>Thẻ title </label>
                            <input type="text" class="form-control" name="site_title_vi" id="site_title_vi" value="{{ $settingArr['site_title_vi'] }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Thẻ desciption</label>
                            <textarea class="form-control" rows="6" name="site_description_vi" id="site_description_vi">{{ $settingArr['site_description_vi'] }}</textarea>
                          </div>  

                          
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="seoEn">                        
                        <div class="form-group">
                            <label>Meta title </label>
                            <input type="text" class="form-control" name="site_title_en" id="site_title_en" value="{{ $settingArr['site_title_en'] }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Meta desciption</label>
                            <textarea class="form-control" rows="6" name="site_description_en" id="site_description_en">{{ $settingArr['site_description_en'] }}</textarea>
                          </div>  
                    </div><!--end thong tin co ban--> 
                   
                  </div>

                </div>             
            
          </div>
        <!-- /.box -->     

        </div><!--meta SEO-->        
      <!--/.col (left) -->      
    </div>
          


    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function(){
      $('#btnUploadLogo').click(function(){        
        $('#file-logo').click();
      });
      $('#btnUploadFavicon').click(function(){        
        $('#file-favicon').click();
      });
      $('#btnUploadBanner').click(function(){        
        $('#file-banner').click();
      });
      var files = "";
      $('#file-logo').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_logo').attr('src',$('#upload_url').val() + response.image_path);
                $( '#logo' ).val( response.image_path );
                $( '#logo_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
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
      var filesFavicon = '';
      $('#file-favicon').change(function(e){
         filesFavicon = e.target.files;
         
         if(filesFavicon != ''){
           var dataForm = new FormData();        
          $.each(filesFavicon, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_favicon').attr('src',$('#upload_url').val() + response.image_path);
                $('#favicon').val( response.image_path );
                $( '#favicon_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
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
      
      var filesBanner = '';
      $('#file-banner').change(function(e){
         filesBanner = e.target.files;
         
         if(filesBanner != ''){
           var dataForm = new FormData();        
          $.each(filesBanner, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_banner').attr('src',$('#upload_url').val() + response.image_path);
                $('#banner').val( response.image_path );
                $( '#banner_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
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

@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bài viết    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('articles.index') }}">Bài viết</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="{{ route('articles.index') }}" style="margin-bottom:5px">Quay lại</a>
    
    <form role="form" method="POST" action="{{ route('articles.update') }}">
    <div class="row">
      <!-- left column -->
      <input name="id" value="{{ $detail->id }}" type="hidden">
      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
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
              <input type="hidden" name="cate_id" value="1">
                <div class="form-group">
                  <label for="email">Ngôn ngữ </label>
                  <select class="form-control" name="lang_id" id="lang_id">                                
                    <option value="1" {{ 1 ==  $detail->lang_id ? "selected" : "" }}>Tiếng Việt</option>
                    <option value="2" {{ 2 ==  $detail->lang_id ? "selected" : "" }}>Tiếng Anh</option>
                    <!-- <option value="3" {{ 3 ==  $detail->lang_id ? "selected" : "" }}>Tiếng Trung</option>   -->                
                  </select>
                </div>                          
                
                <div class="form-group" >
                  
                  <label>Tiêu đề <span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ $detail->title }}">
                </div>               
                
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                    <label class="col-md-3 row">Ảnh thumbnail (556 x 344px)</label>    
                    <div class="col-md-9">
                      <img id="thumbnail_image" src="{{ $detail->image_url ? Helper::showImage($detail->image_url ) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="150">
                   
                      <button class="btn btn-default btn-sm btnSingleUpload" data-set="image_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    </div>
                    <input type="hidden" name="image_url" id="image_url" value="{{ old('image_url', $detail->image_url) }}"/>
                    <div style="clear:both"></div>
                  </div> 
                <div style="clear:both"></div>        
                 <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                    <label class="col-md-3 row">Ảnh chi tiết (0 x 350px)</label>    
                    <div class="col-md-9">
                      <img id="thumbnail_image_2" src="{{ $detail->image_url_2 ? Helper::showImage($detail->image_url_2 ) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" height="150">
                   
                      <button class="btn btn-default btn-sm btnSingleUpload" data-set="image_url_2" data-image="thumbnail_image_2" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    </div>
                    <input type="hidden" name="image_url_2" id="image_url_2" value="{{ old('image_url_2', $detail->image_url_2) }}"/>
                    <div style="clear:both"></div>
                  </div> 
                <div style="clear:both"></div>           
                <!-- textarea -->
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea class="form-control" rows="4" name="description" id="descriptions">{{ $detail->description }}</textarea>
                </div> 
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="is_hot" value="1" {{ $detail->is_hot == 1 ? "checked" : "" }}>
                      Bài viết nổi bật
                    </label>
                  </div>               
                </div>                
                <div class="form-group">
                  <label>Chi tiết</label>
                  <textarea class="form-control" rows="4" name="content" id="content">{{ $detail->content }}</textarea>
                </div>
                  
            </div> 
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('articles.index')}}">Hủy</a>
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
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $detail->meta_title }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description">{{ $detail->meta_description }}</textarea>
              </div>
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="4" name="custom_text" id="custom_text">{{ $detail->custom_text }}</textarea>
              </div>
            
        </div>
        <!-- /.box -->     

      </div>
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
      $(".select2").select2();
      var editor = CKEDITOR.replace( 'content',{
          language : 'vi',
    
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}",
          height : 500
      });
      
    });
    
</script>
@stop

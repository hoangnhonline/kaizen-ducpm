@section('title'){{ $seo['title'] }}@endsection
@section('site_description'){{ $seo['description'] }}@endsection
@section('favicon'){{ Helper::showImage($settingArr['favicon']) }}@endsection
@section('logo'){{ Helper::showImage($settingArr['logo']) }}@endsection


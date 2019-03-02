<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <p class="ft-logo">
                    <img src="{{ URL::asset('public/assets/images/logo.png') }}" alt="">
                </p>
                <p class="ft-description">{!! $textArr['lorem']->$text_key !!}</p>
            </div>
            <div class="col-sm-4 col-xs-12 block-wd block-address">
                <p class="block-title"  style="text-transform: uppercase;">{!! $textArr['lien-he']->$text_key !!}</p>
                <ul class="block-content">
                    <li class="link">
                        <p class="img">
                            <img src="{{ URL::asset('public/assets/images/phone.svg') }}" alt="Phone">
                        </p>
                        <p class="txt">
                            <span>{!! $settingArr['phone'] !!}</span>
                        </p>
                    </li>
                    <li class="link">
                        <p class="img">
                            <img src="{{ URL::asset('public/assets/images/mail.svg') }}" alt="Mail">
                        </p>
                        <p class="txt">
                            <span>{!! $settingArr['email'] !!}</span>
                        </p>
                    </li>
                    <li class="link">
                        <p class="img">
                            <img src="{{ URL::asset('public/assets/images/place.svg') }}" alt="Address">
                        </p>
                        <p class="txt">
                            <span>{!! $textArr['dia-chi-cty']->$text_key !!}</span>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 col-xs-12 block-wd block-social">
                <p class="block-title" style="text-transform: uppercase;">{!! $textArr['ket-noi']->$text_key !!}</p>
                <ul class="block-content">
                    <li><a href="{!! $settingArr['instagram'] !!}" title="Instagram"><img src="{{ URL::asset('public/assets/images/instagram.svg') }}" alt=""></a>
                    </li>
                    <li><a href="{!! $settingArr['facebook_fanpage'] !!}" title="Facebook"><img src="{{ URL::asset('public/assets/images/facebook.svg') }}" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
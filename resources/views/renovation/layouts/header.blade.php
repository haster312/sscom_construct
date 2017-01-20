<div class="header-top-bar-container clearfix">
    <div class="header-top-bar">
        <ul class="contact-details clearfix">
            <li class="template-phone">
                <a href="tel:+149752322235">{{ $info->phone }}</a>
            </li>
            <li class="template-mail">
                <a href="mailto:tuvan.sscom@gmail.com">{{ $info->email }}</a>
            </li>
        </ul>
        <ul class="social-icons">
            @if($info->facebook != '')
            <li>
                <a target="_blank" href="{{ $info->facebook }}" class="social-facebook" title="facebook"></a>
            </li>
            @endif
            @if($info->twitter != '')
            <li>
                <a target="_blank" href="{{ $info->twitter }}" class="social-twitter" title="twitter"></a>
            </li>
            @endif
            @if($info->google != '')
                <li>
                    <a target="_blank" href="{{ $info->google }}" class="social-google-plus" title="google-plus"></a>
                </li>
            @endif
            @if($info->youtube != '')
                <li>
                    <a target="_blank" href="{{ $info->youtube }}" class="social-youtube" title="youtube"></a>
                </li>
            @endif
            <?php
                $locales = \Config::get('app.locales');
                foreach ($locales as $index => $lang):
            ?>
                <li><a class="on @if($lang == $locale) lang-border @endif" href="{{ route("$lang.site.index") }}"><img src="{{ asset("assets/site/flag/$lang.png") }}" alt="{{ $lang }}" class="flag"></a></li>
            <?php
                endforeach;
            ?>
        </ul>
    </div>
    <a href="#" class="header-toggle template-arrow-up"></a>
</div>
<div class="header-container sticky">
    <!--<div class="header-container sticky">-->
    <div class="vertical-align-table column-1-1">
        <div class="header clearfix">
            <div class="logo vertical-align-cell">
                @if($info->logo >0)
                    <img src="{{asset($info->Resources->path)}}" alt="logo">
                @else
                <h4><a href="{{ route($locale.'.site.index') }}">{{ trans('attribute.title') }}</a></h4>
                @endif
            </div>
            <a href="#" class="mobile-menu-switch vertical-align-cell">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </a>
            <div class="menu-container clearfix vertical-align-cell">
                <nav>
                    <ul class="sf-menu">
                        <li {{ $active == "home" ? 'class=selected' : "" }}>
                            <a href="{{ route($locale.'.site.index') }}" title="Home">
                                {!! trans('attribute.home') !!}
                            </a>
                        </li>
                        <li {{ $active == "page" ? 'class=selected' : "" }}>
                            <a href="{{ route($locale.".site.introduce.main") }}" title="{{ trans('attribute.introduce.menu') }}">
                                {!! trans('attribute.introduce.menu') !!}
                            </a>
                            @if(count($pageTransList) > 0)
                            <ul>
                                @foreach($pageTransList as $pageTrans)
                                <li>
                                    <a href="{{ route($locale.".site.introduce",["pageId"=>$pageTrans->pageId,"pageSlug"=>$pageTrans->pageSlug]) }}" title="{{ $pageTrans->pageTitle }}">
                                        {!! $pageTrans->pageTitle !!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @if(count($parentCatTransList) > 0)
                            @foreach($parentCatTransList as $parent)
                            <li {{ $active == $parent->projectCatSlug ? 'class=selected' : "" }}>
                                <a href="{{ route($locale.".site.project",["categoryId"=>$parent->projectCatId, 'categorySlug' => $parent->projectCatSlug]) }}" title="{{ $parent->projectCatName }}">
                                    {!! $parent->projectCatName !!}
                                </a>
                            <?php $childCatTransList = $projectBusiness->getChildCategory($parent->projectCatId,$locale); ?>
                            @if(count($childCatTransList) > 0)
                                <ul>
                                    @foreach($childCatTransList as $childCatTrans)
                                        <li><a href="{{ route($locale.".site.project",["categoryId"=>$childCatTrans->projectCatId, 'categorySlug' => $childCatTrans->projectCatSlug]) }}">{!! $childCatTrans->projectCatName !!}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                            </li>
                            @endforeach
                        @endif
                        <li {{ $active == "news" ? 'class=selected' : "" }}>
                            <a href="{{ route("$locale.site.news") }}" title="{{ trans('attribute.news.menu') }}">
                                {!! trans('attribute.news.menu') !!}
                            </a>
                        </li>
                        <li {{ $active == "member" ? 'class=selected' : "" }}>
                            <a href="{{ route("$locale.site.member") }}" title="{{ trans('attribute.news.member') }}">
                                {!! trans('attribute.member.menu') !!}
                            </a>
                        </li>
                        <li class="left-flyout {{ $active == "contact" ? "selected" : "" }}">
                            <a class="on" href="{{ route($locale.".site.contact") }}">
                                {!! trans('attribute.contact.menu') !!}
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="mobile-menu-container">
                    <div class="mobile-menu-divider"></div>
                    <nav>
                        <ul class="mobile-menu collapsible-mobile-submenus">
                            <li {{ $active == "home" ? 'class=selected' : "" }}>
                                <a href="{{ route($locale.'.site.index') }}" title="Home">
                                    {!! trans('attribute.home') !!}
                                </a>
                            </li>
                            <li {{ $active == "page" ? 'class=selected' : "" }}>
                                <a href="{{ route($locale.".site.introduce.main") }}" title="{{ trans('attribute.introduce.menu') }}">
                                    {!! trans('attribute.introduce.menu') !!}
                                </a>
                                @if(count($pageTransList) > 0)
                                <a href="#" class="template-arrow-menu"></a>
                                    <ul>
                                        @foreach($pageTransList as $pageTrans)
                                        <li>
                                            <a href="{{ route($locale.".site.introduce",["pageId"=>$pageTrans->pageId,"pageSlug"=>$pageTrans->pageSlug]) }}" title="{{ $pageTrans->pageTitle }}">
                                                {!! $pageTrans->pageTitle !!}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @if(count($parentCatTransList) > 0)
                                @foreach($parentCatTransList as $parent)
                                    <li {{ $active == $parent->projectCatSlug ? 'class=selected' : "" }}>
                                        <a href="{{ route($locale.".site.project",["categoryId"=>$parent->projectCatId, 'categorySlug' => $parent->projectCatSlug]) }}" title="{{ $parent->projectCatName }}">
                                            {!! $parent->projectCatName !!}
                                        </a>
                                        <?php $childCatTransList = $projectBusiness->getChildCategory($parent->projectCatId,$locale); ?>
                                        @if(count($childCatTransList) > 0)
                                        <a href="#" class="template-arrow-menu"></a>
                                            <ul>
                                                @foreach($childCatTransList as $childCatTrans)
                                                    <li><a href="{{ route($locale.".site.project",["categoryId"=>$childCatTrans->projectCatId,'categorySlug' => $childCatTrans->projectCatSlug]) }}">{!! $childCatTrans->projectCatName !!}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                            <li {{ $active == "news" ? 'class=selected' : "" }}>
                                <a href="{{ route("$locale.site.news") }}" title="{{ trans('attribute.news.menu') }}">
                                    {!! trans('attribute.news.menu') !!}
                                </a>
                            </li>
                            <li {{ $active == "member" ? 'class=selected' : "" }}>
                                <a href="{{ route("$locale.site.member") }}" title="{{ trans('attribute.news.member') }}">
                                    {!! trans('attribute.member.menu') !!}
                                </a>
                            </li>
                            <li class="left-flyout {{ $active == "contact" ? "selected" : "" }}">
                                <a class="on" href="{{ route($locale.".site.contact") }}">
                                    {!! trans('attribute.contact.menu') !!}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="revolution-slider-container">
    <div class="revolution-slider">
        @if(count($sliders) > 0)
        <ul style="display: none;">
            @foreach($sliders as $slider)
            <!-- SLIDE 1 -->
                <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="6000">
                    <!-- MAIN IMAGE -->
                    <img style="height: {{ $height }}px" src="{{ asset($slider->Resources->path) }}" alt="{{ asset($slider->sliderAlt) }}" data-lazyload="{{ asset($slider->Resources->path) }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<!--/-->
<script>
    //slider
    jQuery('.revolution-slider').show().revolution({
        dottedOverlay:"none",
        delay:10000,
        gridwidth:1170,
        gridheight: "{{ $height }}",
        sliderLayout:"auto",
        navigation: {
            keyboardNavigation:"on",
            onHoverStop:"on",
            touch:{
                touchenabled:"on",
                swipe_treshold : 75,
                swipe_min_touches : 1,
                drag_block_vertical:false,
                swipe_direction:"horizontal"
            },
            arrows: {
                style:"preview1",
                enable:true,
                hide_onmobile:true,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1500,
                hide_under:0,
                hide_over:9999,
                tmp:'',
                left : {
                    h_align:"left",
                    v_align:"center",
                    h_offset:0,
                    v_offset:0,
                },
                right : {
                    h_align:"right",
                    v_align:"center",
                    h_offset:0,
                    v_offset:0
                }
            },
            bullets: {
                style:"preview1",
                enable:true,
                hide_onmobile:true,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1500,
                hide_under:0,
                hide_over:9999,
                direction:"horizontal",
                h_align:"center",
                v_align:"bottom",
                space:10,
                h_offset:0,
                v_offset:20,
                tmp:'<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>'
            },
        },
        shadow:0,
        spinner:"spinner0",
        stopAfterLoops:-1,
        stopAtSlide:-1,
        disableProgressBar: "on"
    });
</script>
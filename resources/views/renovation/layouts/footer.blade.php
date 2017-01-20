<div class="row yellow full-width padding-top-bottom-30">
    <div itemscope itemtype="contact" class="hidden">
        <span itemprop="name">{{ trans('attribute.title') }}</span>
        <span itemprop="company">{{ trans('attribute.title') }}</span>
        <span itemprop="tel">{{ $info->phone }}</span>
        <a itemprop="email" href="mailto:{{ $info->email }}">{{ $info->email }}</a>
    </div>
    <div class="row">
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-phone">
                    <p>{{ trans('attribute.contact.phone') }}:<br>
                        {{ $info->phone }}</p>
                </li>
            </ul>
        </div>
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-location">
                    <p>{{ $info->address }}</p>
                </li>
            </ul>
        </div>
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-mail">
                    <p>{{ trans('attribute.contact.email') }}:<br>
                        <a href="mailto:{{ $info->email }}">{{ $info->email }}</a>

                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row align-center padding-top-bottom-30">
    <span class="copyright">2016 COPY RIGHT &copy; SSCOM COMPANY</span>
    <div class="g-plusone" data-size="small" data-annotation="none"></div>
</div>
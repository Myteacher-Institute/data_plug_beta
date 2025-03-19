<footer>
    <div class="iner-footer">
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link">About</a></li>
                <li class="footer-list"><a href="" class="footer-link">Contact us</a></li>
                <li class="footer-list"><a href="" class="footer-link">Report an issue</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link active">DataPlug Office</a></li>
                <li class="footer-list"><a href="" class="footer-link">Myteacher institute</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link active">Contact Us</a></li>
                <li class="footer-list"><a href="" class="footer-link">Whatsapp</a></li>
                <li class="footer-list"><a href="" class="footer-link">call Us with this Number: +2348167656064</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <img class="arrow-svg" src="{{ asset('assset/img/arrow.svg') }}" alt="" width="20px" style="cursor: pointer" onclick="showLinks()">
            <ul class="ul-list active" id="active-hide">
                <li class="footer-list"><a href="#rc" class="footer-link active" id="hls">DataPlug Office Address</a></li>
                <li class="footer-list"><a href="" class="footer-link" id="lsh rc">Myteacher institute</a></li>
                <li class="footer-list"><a href="" class="footer-link" id="lsh rp">Myteacher Tech Store</a></li>
            </ul>
        </div>
    </div>
    @php
        $settings = App\Models\Settings::where('id',1)->first();
    @endphp
    <div class="data-plug-footer">
        <a href="{{ url('/') }}" class="a"><img @if ($settings) src={{  asset('uploads/'.$settings->logo) }}@endif class="logo"></a>
        <span class="limited">
            <i class="fa-regular fa-copyright"></i>
            @php
                echo date('Y-m-d H:i:s');
            @endphp
            @if ($settings) {{ $settings->website_title }}@endif Services Limited
        </span>
        <div class="socia-media">
            <i class="fab fa-facebook icons" aria-hidden="true"></i>
            <i class="fab fa-twitter icons" aria-hidden="true"></i>
            <i class="fab fa-meta icons"></i>
            <i class="fab fa-instagram icons" aria-hidden="true"></i>
        </div>
    </div>
</footer>

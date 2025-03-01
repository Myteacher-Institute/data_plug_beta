<footer>
    <div class="iner-footer">
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link active">Company</a></li>
                <li class="footer-list"><a href="" class="footer-link">About</a></li>
                <li class="footer-list"><a href="" class="footer-link">Press & Media</a></li>
                <li class="footer-list"><a href="" class="footer-link">Contact us</a></li>
                <li class="footer-list"><a href="" class="footer-link">Report an issue</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link active">Resources</a></li>
                <li class="footer-list"><a href="" class="footer-link">Privecy Policy</a></li>
                <li class="footer-list"><a href="" class="footer-link">Terms & Conditions</a></li>
                <li class="footer-list"><a href="" class="footer-link">Documentation</a></li>
                <li class="footer-list"><a href="" class="footer-link">Security</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link active">Discovery</a></li>
                <li class="footer-list"><a href="" class="footer-link">Personal</a></li>
                <li class="footer-list"><a href="" class="footer-link">Business</a></li>
                <li class="footer-list"><a href="" class="footer-link">Agent Network</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <ul class="ul-list">
                <li class="footer-list"><a href="" class="footer-link active">DataPlug Office</a></li>
                <li class="footer-list"><a href="" class="footer-link">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, laborum?</a></li>
                <li class="footer-list"><a href="" class="footer-link">Lorem ipsum dolor sit, amet consectetur adipisicing.</a></li>
            </ul>
        </div>
        <div class="footer-box">
            <img class="arrow-svg" src="{{ asset('assset/img/arrow.svg') }}" alt="" width="20px" style="cursor: pointer" onclick="showLinks()">
            <ul class="ul-list active" id="active-hide">
                <li class="footer-list"><a href="" class="footer-link active" id="hls">DataPlug Office Address</a></li>
                <li class="footer-list"><a href="" class="footer-link" id="lsh">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita tempore omnis dolor culpa distinctio ratione molestiae!</a></li>
                <li class="footer-list"><a href="" class="footer-link" id="lsh">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellendus consectetur dolores quis vitae voluptate veritatis libero porro earum!</a></li>
                <li class="footer-list"><a href="" class="footer-link" id="lsh">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos asperiores dignissimos molestiae architecto dolores fuga tempora, officia, ullam quisquam provident fugiat omnis sit?</a></li>
                <li class="footer-list"><a href="" class="footer-link" id="lsh">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, magnam ipsa? Culpa incidunt dolor natus ipsum neque? Quos autem iure ipsum voluptas assumenda dolores, dolorem eius sapiente. Repellendus, quas consequatur?</a></li>
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

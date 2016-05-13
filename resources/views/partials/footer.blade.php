@if(Route::current()->getAction()['namespace'] == 'App\Http\Controllers\Admin')
<footer>
    <div id="footer">
        {{trans('footer.copyRight')}}
        <a href="https://www.zarinpal.com/" target="_blank">
            {{trans('footer.zarinpal')}}
        </a>
        {{trans('footer.is')}}
        <i class="fontello-heart-1 text-green"></i>
    </div>
</footer>
@else
    <footer class="no-print" style="display: block;">

        <div class="row" style="border-top:.1rem solid #E0E0E0;padding-top:1rem;padding-bottom:0.5rem">
            <div class="columns large-6 medium-6 small-12">
                <p lang="fa" class="show-for-medium-up">
                    <span><a href="https://www.zarinpal.com/pricing.html">{{trans('footer.pricing')}}</a> | </span>
                    <span><a href="https://www.zarinpal.com/faq.html">{{trans('footer.faq')}}</a> | </span>
                    <span><a href="https://old.zarinpal.com/Labs/">{{trans('footer.labs')}}</a></span>
                </p>
                <p lang="fa">
                    {{trans('footer.copyRight')}}
                    <a href="https://www.zarinpal.com/" target="_blank">
                        {{trans('footer.zarinpal')}}
                    </a>
                    {{trans('footer.is')}}
                </p>
            </div>
            <div id="social_links" class="columns large-6 medium-6 small-12 " dir="ltr">

                <div>
                    <a href="https://twitter.com/zarinpal" target="_blank" class="global--footer_social-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"></path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/zarinpal/" target="_blank"
                       class="global--footer_social-instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M365.3 234.1h-24.7c1.8 7 2.9 14.3 2.9 21.9 0 48.3-39.2 87.5-87.5 87.5 -48.3 0-87.5-39.2-87.5-87.5 0-7.6 1.1-14.9 2.9-21.9h-24.7V354.4c0 6 4.9 10.9 10.9 10.9H354.4c6 0 10.9-4.9 10.9-10.9V234.1H365.3zM365.3 157.6c0-6-4.9-10.9-10.9-10.9h-32.8c-6 0-10.9 4.9-10.9 10.9v32.8c0 6 4.9 10.9 10.9 10.9h32.8c6 0 10.9-4.9 10.9-10.9V157.6zM256 201.3c-30.2 0-54.7 24.5-54.7 54.7 0 30.2 24.5 54.7 54.7 54.7 30.2 0 54.7-24.5 54.7-54.7C310.7 225.8 286.2 201.3 256 201.3M365.3 398.1H146.7c-18.1 0-32.8-14.7-32.8-32.8V146.7c0-18.1 14.7-32.8 32.8-32.8h218.7c18.1 0 32.8 14.7 32.8 32.8v218.7C398.1 383.4 383.5 398.1 365.3 398.1"></path>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/zarinpal/" target="_blank" class="global--footer_social-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M212.314 198.895H176v56.445h36.314V421h69.76V254.587h48.682l5.145-55.692h-53.827V167.14c0-13.1 2.77-18.376 16.13-18.376H336V91h-48.287c-51.948 0-75.3 21.768-75.3 63.418-.1 36.374-.1 44.477-.1 44.477z"></path>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/company/zarinpal" target="_blank"
                       class="global--footer_social-linkedin">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </footer>
@endif

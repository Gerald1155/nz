<footer class="mkdf-page-footer ">
   <div class="mkdf-footer-top-holder">
      <div class="mkdf-footer-top-inner mkdf-grid">
         <div class="mkdf-grid-row mkdf-footer-top-alignment-left mkdf-grid-huge-gutter">
            <div class="mkdf-column-content mkdf-grid-col-3">
               <div id="text-2" class="widget mkdf-footer-column-1 widget_text">
                  <div class="mkdf-widget-title-holder">
                     <h4 class="mkdf-widget-title"> <img src="{{asset("logo/logo.png")}}" width="300px" alt="logo"> </h4>
                  </div>
                  <div class="textwidget">
                     <p style="color: #c3c3c3; margin-bottom: -21px;">Create your brand new architecture or interior design website today! It’s super easy with Dør.</p>
                  </div>
               </div>
               <div class="widget mkdf-separator-widget">
                  <div class="mkdf-separator-holder clearfix  mkdf-separator-center mkdf-separator-normal">
                     <div class="mkdf-separator" style="border-style: solid;margin-top: 8px"></div>
                  </div>
               </div>
               <div id="text-5" class="widget mkdf-footer-column-1 widget_text">
                  <div class="textwidget">
                     <div>
                        <div class="mkdf-iwt clearfix  mkdf-iwt-full-width-layout mkdf-iwt-icon-left mkdf-iwt-icon-medium">
                           <div class="mkdf-iwt-content" style="padding:0px">
                              <p class="mkdf-iwt-title">
                                 <a itemprop="url" href="mailto:Zhukovskyyn@yahoo.com" target="_self" rel="noopener">
                                 <span class="mkdf-iwt-title-text"><span class="__cf_email__" data-cfemail="7f1b100d3f0e101b1a16110b1a0d1e1c0b16091a511c1012">Email Us : Zhukovskyyn@yahoo.com</span></span>
                                 </a>
                              </p>
                              <p class="mkdf-iwt-title">
                                 <a itemprop="url" href="tel:2035247974" target="_self" rel="noopener">
                                 <span class="mkdf-iwt-title-text"><span class="__cf_email__" data-cfemail="7f1b100d3f0e101b1a16110b1a0d1e1c0b16091a511c1012">Call us : 203-524-7974</span></span>
                                 </a>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="widget mkdf-separator-widget">
                  <div class="mkdf-separator-holder clearfix  mkdf-separator-center mkdf-separator-normal">
                     <div class="mkdf-separator" style="border-style: solid;margin-top: 18px"></div>
                  </div>
               </div>
               <div class="widget mkdf-contact-form-7-widget ">
                  <div role="form" class="wpcf7" id="wpcf7-f10-o1" lang="en-US" dir="ltr">
                     <div class="screen-reader-response">
                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="mkdf-column-content mkdf-grid-col-3">
               <div id="mkdf_twitter_widget-2" class="widget mkdf-footer-column-2 widget_mkdf_twitter_widget">
                  <div class="mkdf-widget-title-holder">
                     <h4 class="mkdf-widget-title">Pages</h4>
                  </div>
                  <ul class="mkdf-twitter-widget mkdf-twitter-standard">
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{route("index")}}"> 
                              Home
                           </a>
                        </div>
                     </li>
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{route("about")}}"> 
                              About Us
                           </a>
                        </div>
                     </li>
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{route("contact")}}"> 
                              Contact Us
                           </a>
                        </div>
                     </li>
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{route("portfolios")}}"> 
                              Portfolio
                           </a>
                        </div>
                     </li>
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{route("reviews")}}"> 
                              Reviews
                           </a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="widget mkdf-separator-widget">
                  <div class="mkdf-separator-holder clearfix  mkdf-separator-center mkdf-separator-normal">
                     <div class="mkdf-separator" style="border-style: solid;margin-top: 0px;margin-bottom: 0px"></div>
                  </div>
               </div>
            </div>
            
            <div class="mkdf-column-content mkdf-grid-col-3">
               <div id="mkdf_twitter_widget-2" class="widget mkdf-footer-column-2 widget_mkdf_twitter_widget">
                  <div class="mkdf-widget-title-holder">
                     <h4 class="mkdf-widget-title">Projects & Portfolio</h4>
                  </div>
                  <ul class="mkdf-twitter-widget mkdf-twitter-standard" >
                    @foreach (App\Models\Portfolio::orderBy("created_at","DESC")->take(5)->get() as $portfolio)
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{$portfolio->show()}}"> 
                              {{$portfolio->name}}
                           </a>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
            <div class="mkdf-column-content mkdf-grid-col-3">
               <div id="mkdf_twitter_widget-2" class="widget mkdf-footer-column-2 widget_mkdf_twitter_widget">
                  <div class="mkdf-widget-title-holder">
                     <h4 class="mkdf-widget-title">Reviews</h4>
                  </div>
                  <ul class="mkdf-twitter-widget mkdf-twitter-standard" >
                    @foreach (App\Models\Review::orderBy("created_at","DESC")->take(1)->get() as $review)
                     <li class="mkdf-tweet-holder" style="font-size: 19px">
                        <div class="mkdf-tweet-text" style="padding: 0px">
                           <a target="_blank" href="{{route("reviews")}}"> 
                              <p>{{$review->review}}</p>
                              {{$review->name}}
                           </a>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
      </div>
   </div>
   <div class="mkdf-footer-bottom-holder">
      <div class="mkdf-footer-bottom-inner mkdf-grid">
         <div class="mkdf-grid-row ">
            <div class="mkdf-grid-col-12" >
               <div id="text-6" class="widget mkdf-footer-bottom-column-2 widget_text">
                  <div class="textwidget" style="text-align: center">
                     <p><a href="https://www.instagram.com/website__designers/" target="_blank" rel="nofollow noopener">© 2022 Designed By Website Designers, All Rights Reserved To N.Z Home Improvments & Renovation</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
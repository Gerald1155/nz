@extends('layouts.main')
@section('content')
<div class="mkdf-content" >
    <div class="mkdf-content-inner" >
      <div class="mkdf-title-holder mkdf-standard-type mkdf-title-va-header-bottom mkdf-preload-background mkdf-has-bg-image mkdf-bg-responsive-disabled" style="height: 250px;background-image:url(https://dor.qodeinteractive.com/wp-content/uploads/2019/03/title-image.jpg);" data-height="250">
         <div class="mkdf-title-image">
            <img itemprop="image" src="https://dor.qodeinteractive.com/wp-content/uploads/2019/03/title-image.jpg" alt="d" />
         </div>
         <div class="mkdf-title-wrapper" style="height: 250px">
            <div class="mkdf-title-inner">
               <div class="mkdf-grid">
                  <h2 class="mkdf-page-title entry-title">About Us</h2>
               </div>
            </div>
         </div>
      </div>
       <div class="mkdf-full-width">
          <div class="mkdf-full-width-inner">
             <div class="mkdf-grid-row">
                <div class="mkdf-page-content-holder mkdf-grid-col-12">
                   <div class="mkdf-row-grid-section-wrapper ">
                      <div class="mkdf-row-grid-section">
                         <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                               <div class="vc_column-inner">
                                  <div class="wpb_wrapper">
                                     <div class="mkdf-elements-holder   mkdf-one-column  mkdf-responsive-mode-768 ">
                                        <div class="mkdf-eh-item    " data-item-class="mkdf-eh-custom-1909" data-769-1024="150px 0% 150px" data-681-768="150px 0% 150px" data-680="150px 0% 150px">
                                           <div class="mkdf-eh-item-inner">
                                              <div class="mkdf-eh-item-content mkdf-eh-custom-1909" style="padding: 150px 0% 208px">
                                                 <div class="mkdf-layout-holder  mkdf-left-layout mkdf-slider-type mkdf-pag-enabled mkdf-lh-custom-4308" data-item-class="mkdf-lh-custom-4308" data-1025-1366="21px 6% 45px" data-481-1024="77px 5% 77px">
                                                    <div class="mkdf-lh-slider-images mkdf-owl-slider" data-number-of-items="1" data-enable-loop="yes" data-enable-autoplay="yes" data-slider-speed="5000" data-slider-speed-animation="600" data-enable-navigation="no" data-enable-pagination="yes">
                                                      @foreach ($about1->images as $img)
                                                         <img width="800" height="500" src="{{asset($img->url)}}" class="attachment-full size-full" alt="d" loading="lazy" srcset="{{asset($img->url)}} 800w, {{asset($img->url)}} 300w, {{asset($img->url)}} 768w" sizes="(max-width: 800px) 100vw, 800px" />
                                                      @endforeach 

                                                    </div>
                                                    <div class="mkdf-lh-content" style="padding: 41px 6% 69px">
                                                       <div class="vc_empty_space" style="height: 13px"><span class="vc_empty_space_inner"></span></div>
                                                       <div class="wpb_text_column wpb_content_element ">
                                                          <div class="wpb_wrapper">
                                                          <h3>About Us</h3>
                                                          {!!$text->text!!}
                                                          </div>
                                                       </div>
                                                       <div class="vc_empty_space" style="height: 6px"><span class="vc_empty_space_inner"></span></div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div data-parallax-bg-image="{{count($about2->images) > 0 ? $about2->images[0]->url:""}}" data-parallax-bg-speed="1" class="vc_row wpb_row vc_row-fluid vc_custom_1551951348781 mkdf-parallax-row-holder mkdf-content-aligment-center">
                      <div class="wpb_column vc_column_container vc_col-sm-12">
                         <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                               <div class="mkdf-elements-holder   mkdf-one-column  mkdf-responsive-mode-768 ">
                                  <div class="mkdf-eh-item mkdf-content-in-focus   " data-item-class="mkdf-eh-custom-4810" data-681-768="0px 5% 0px" data-680="0px 10% 0px">
                                     <div class="mkdf-eh-item-inner">
                                        <div class="mkdf-eh-item-content mkdf-eh-custom-4810" style="padding: 0px 0% 0px">
                                           <div class="wpb_text_column wpb_content_element ">
                                              <div class="wpb_wrapper">
                                                 <h1>Contact Us For Your Projects</h1>
                                              </div>
                                           </div>
                                           <div class="vc_empty_space" style="height: 22px"><span class="vc_empty_space_inner"></span></div>
                                           <a itemprop="url" href="{{route("contact")}}" target="_self" style="padding: 15px 45px" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid">
                                           <span class="mkdf-btn-border-holder"></span>
                                           <span class="mkdf-btn-line-holder"></span>
                                           <span class="mkdf-btn-text">Contact Us</span>
                                           </a> 
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
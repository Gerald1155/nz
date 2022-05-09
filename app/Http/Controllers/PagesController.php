<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use App\Models\Portfolio;
use Illuminate\Validation\Rule;
use App\Models\Text;
use Mail;
use App\Models\Pages;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
class PagesController extends Controller
{
    public function index()
    {
        $text = Text::where("section","about")->first();
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription($text->text);
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addKeyword(["home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"]);
        OpenGraph::setDescription($text->text);
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        TwitterCard::setType("summary");
        TwitterCard::setTitle('N.Z Home Improvement & Renovations');
        TwitterCard::setDescription($text->text);
        TwitterCard::setImage(asset("logo/logo.png"));

        JsonLd::setDescription($text->text);
        JsonLd::addImage(asset("logo/logo.png"));



        $portfolios = Portfolio::orderBy("created_at",'DESC')->get();
        return view("index",compact("portfolios"));
    }

    public function about()
    {
        $text = Text::where("section","about")->first();
        SEOMeta::setTitle('About Us');
        SEOMeta::setDescription($text->text);
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addKeyword(["home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"]);

        OpenGraph::setDescription($text->text);
        OpenGraph::setTitle('About Us');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        TwitterCard::setType("summary");
        TwitterCard::setTitle('N.Z Home Improvement & Renovations');
        TwitterCard::setDescription($text->text);
        TwitterCard::setImage(asset("logo/logo.png"));


        JsonLd::setTitle("About Us");
        JsonLd::setDescription($text->text);
        JsonLd::addImage(asset("logo/logo.png"));
        $about1 = Pages::where("section","about")->first();
        $about2 = Pages::where("section","About Contact Us")->first();
        return view("about",compact("text","about1","about2"));
    }

    public function contact()
    {
        if (Cookie::Get("contact") == null) {
            $text = Text::where("section","about")->first();
            SEOMeta::setTitle('Contact us');
            SEOMeta::setDescription($text->text);
            SEOMeta::setCanonical(url()->current());
            SEOMeta::addKeyword(["get a quote for renovation","contact us","N.Z contact us","home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"]);
    
            OpenGraph::setDescription($text->text);
            OpenGraph::setTitle('Contact us');
            OpenGraph::setUrl(url()->current());
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('locale', 'en_US');
    
            TwitterCard::setType("summary");
            TwitterCard::setTitle('N.Z Home Improvement & Renovations');
            TwitterCard::setDescription($text->text);
            TwitterCard::setImage(asset("logo/logo.png"));
    
    
            JsonLd::setTitle("Contact us");
            JsonLd::setDescription($text->text);
            JsonLd::addImage(asset("logo/logo.png"));

            return view("contact");
        }
        else
        {
            //already exsits 
            $id = Cookie::get("contact");
            $info = ContactUs::where("id",$id)->first();
            if($info)
            {
                return view("contact",compact("info"));
            }
            else
            {
                Cookie::queue(Cookie::forget('contact'));
                return redirect()->route("contact");
            }
        }

    }
    
    public function contact_store(Request $request)
    {
        if (Cookie::Get("contact") == null) {
            $validation = Validator::make($request->all(),[
                "name"=>"required",
                "email"=>"required|email|unique:contact_us,email",
                "phone"=>"required|unique:contact_us,phone|".Rule::phone()->country(["US"])->type('mobile'),
                "type"=>"required",
                "description"=>"required"
            ]);
            if ($validation->passes()) {
                $contact = ContactUs::create($request->except(["_token","_method"]));
                $GLOBALS["email"] = $contact->email;
                $data = array("name"=>$contact->name,"email"=>$contact->email,"type"=>$contact->type,"description"=>$contact->description);
                Mail::send('mail',$data,function($message){
                    $email = $GLOBALS["email"];
                    $message->to($email,"Dear Your Information Has Been Saved Successfully We'll get back to you as soon as we can.")
                    ->subject("Project");
                    $message->from("xyz@gmail.com","Gerald"); 
                });

                return redirect()->back()->with(["success"=>"Your Information Saved Successfully."])->withcookie(cookie()->forever("contact",$contact->id));
            }
            else
            {

                return redirect()->back()->withErrors($validation,"error");
            }
        }
        else
        {
            $id = Cookie::get("contact");
            $info = ContactUs::where("id",$id)->first();
            return view("contact",compact("info"));
        }
    }

    public function reviews()
    {
        $reviews = Review::orderBy("created_at","DESC")->get();
        SEOMeta::setTitle('Reviews');
        SEOMeta::setDescription("Here is what our clients had to say about our work.");
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addKeyword(["renovation reviews","renovation testimonials","get a quote for renovation","contact us","N.Z contact us","home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"]);

        OpenGraph::setDescription("Here is what our clients had to say about our work.");
        OpenGraph::setTitle('Reviews');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        TwitterCard::setType("summary");
        TwitterCard::setTitle('N.Z Home Improvement & Renovations');
        TwitterCard::setDescription("Here is what our clients had to say about our work.");
        TwitterCard::setImage(asset("logo/logo.png"));


        JsonLd::setTitle("Reviews");
        JsonLd::setDescription("Here is what our clients had to say about our work.");
        JsonLd::addImage(asset("logo/logo.png"));
        return view("reviews",compact("reviews"));
    }

    public function portfolios()
    {
        $portfolios = Portfolio::orderBy("created_at","DESC")->get();
        SEOMeta::setTitle('Portfolio');
        SEOMeta::setDescription("Here are some of the project we've worked on over the years.");
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addKeyword(["renovation Portfolio","renovation project","house improvment project","get a quote for renovation","contact us","N.Z contact us","home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"]);

        OpenGraph::setDescription("Here are some of the project we've worked on over the years.");
        OpenGraph::setTitle('Portfolio');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        TwitterCard::setType("summary");
        TwitterCard::setTitle('N.Z Home Improvement & Renovations');
        TwitterCard::setDescription("Here are some of the project we've worked on over the years.");
        TwitterCard::setImage(asset("logo/logo.png"));


        JsonLd::setTitle("Portfolio");
        JsonLd::setDescription("Here are some of the project we've worked on over the years.");
        JsonLd::addImage(asset("logo/logo.png"));
        return view("portfolios",compact("portfolios"));
    }

    public function portfolio($id,$name)
    {
        $portfolio = Portfolio::findorfail($id);
        SEOMeta::setTitle($portfolio->name);
        SEOMeta::setDescription($portfolio->description);
        SEOMeta::addMeta('article:published_time', $portfolio->created_at->toW3CString(), 'property');
        
        SEOMeta::addKeyword(["home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"]);


        OpenGraph::setDescription($portfolio->description);
        OpenGraph::setTitle($portfolio->name);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'Portfolio');
        OpenGraph::addProperty('locale', 'en_US');

        OpenGraph::addImage($portfolio->cover());
        OpenGraph::addImage(['url' => $portfolio->cover(), 'size' => 300]);
        OpenGraph::addImage($portfolio->cover(), ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($portfolio->name);
        JsonLd::setDescription($portfolio->description);
        JsonLd::setType('portfolio');

        return view("portfolio",compact("portfolio"));
    }
}

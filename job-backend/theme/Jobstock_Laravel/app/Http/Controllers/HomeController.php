<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');  
    }

    public function home2()
    {
        return view('home-2');  
    }

    public function home3()
    {
        return view('home-3');  
    }

    public function home4()
    {
        return view('home-4');  
    }

    public function home5()
    {
        return view('home-5');  
    }

    public function home6()
    {
        return view('home-6');  
    }

    public function home7()
    {
        return view('home-7');  
    }

    public function home8()
    {
        return view('home-8');  
    }

    public function home9()
    {
        return view('home-9');  
    }
    
    public function home10()
    {
        return view('home-10');  
    }

    public function home11()
    {
        return view('home-11');  
    }

    public function home12()
    {
        return view('home-12');  
    }

    public function gridStyle1()
    {
        return view('grid-style-1');  
    }

    public function gridStyle2()
    {
        return view('grid-style-2');  
    }

    public function gridStyle3()
    {
        return view('grid-style-3');  
    }

    public function gridStyle4()
    {
        return view('grid-style-4');  
    }

    public function gridStyle5()
    {
        return view('grid-style-5');  
    }

    public function fullJobGrid1()
    {
        return view('full-job-grid-1');  
    }

    public function fullJobGrid2()
    {
        return view('full-job-grid-2');  
    }

    public function listStyle1()
    {
        return view('list-style-1');  
    }

    public function listStyle2()
    {
        return view('list-style-2');  
    }

    public function listStyle3()
    {
        return view('list-style-3');  
    }

    public function fullJobList1()
    {
        return view('full-job-list-1');  
    }

    public function fullJobList2()
    {
        return view('full-job-list-2');  
    }

    public function halfMap()
    {
        return view('half-map');  
    }

    public function halfMap2()
    {
        return view('half-map-2');  
    }

    public function halfMap3()
    {
        return view('half-map-3');  
    }

    public function halfMapList1()
    {
        return view('half-map-list-1');  
    }

    public function halfMapList2()
    {
        return view('half-map-list-2');  
    }

    public function candidateGrid1()
    {
        return view('candidate-grid-1');  
    }

    public function candidateGrid2()
    {
        return view('candidate-grid-2');  
    }

    public function candidateList1()
    {
        return view('candidate-list-1');  
    }

    public function candidateList2()
    {
        return view('candidate-list-2');  
    }

    public function candidateHalfMap()
    {
        return view('candidate-half-map');  
    }

    public function candidateHalfMapList()
    {
        return view('candidate-half-map-list');  
    }

    public function singleLayout1()
    {
        return view('single-layout-1');  
    }

    public function singleLayout2()
    {
        return view('single-layout-2');  
    }

    public function singleLayout3()
    {
        return view('single-layout-3');  
    }

    public function singleLayout4()
    {
        return view('single-layout-4');  
    }

    public function singleLayout5()
    {
        return view('single-layout-5');  
    }

    public function singleLayout6()
    {
        return view('single-layout-6');  
    }

    public function candidateDetail()
    {
        return view('candidate-detail');  
    }

    public function candidateDetail2()
    {
        return view('candidate-detail-2');  
    }

    public function candidateDetail3()
    {
        return view('candidate-detail-3');  
    }

    public function advanceSearch()
    {
        return view('advance-search');  
    }

    public function candidateDashboard()
    {
        return view('candidate-dashboard');  
    }

    public function candidateProfile()
    {
        return view('candidate-profile');  
    }

    public function candidateResume()
    {
        return view('candidate-resume');  
    }

    public function candidateAppliedJobs()
    {
        return view('candidate-applied-jobs');  
    }

    public function candidateAlertJob()
    {
        return view('candidate-alert-job');  
    }

    public function candidateSavedJobs()
    {
        return view('candidate-saved-jobs');  
    }

    public function candidateFollowEmployers()
    {
        return view('candidate-follow-employers');  
    }
    
    public function candidateMessages()
    {
        return view('candidate-messages');  
    }

    public function candidateChangePassword()
    {
        return view('candidate-change-password');  
    }

    public function candidateDeleteAccount()
    {
        return view('candidate-delete-account');  
    }

    public function employerGrid1()
    {
        return view('employer-grid-1');  
    }

    public function employerGrid2()
    {
        return view('employer-grid-2');  
    }

    public function employerList1()
    {
        return view('employer-list-1');  
    }

    public function employerHalfMap()
    {
        return view('employer-half-map');  
    }

    public function employerHalfMapList()
    {
        return view('employer-half-map-list');  
    }

    public function employerDetail()
    {
        return view('employer-detail');  
    }

    public function employerDetail2()
    {
        return view('employer-detail-2');  
    }

    public function employerDashboard()
    {
        return view('employer-dashboard');  
    }

    public function employerProfile()
    {
        return view('employer-profile');  
    }

    public function employerJobs()
    {
        return view('employer-jobs');  
    }

    public function employerSubmitJob()
    {
        return view('employer-submit-job');  
    }

    public function employerApplicantsJobs()
    {
        return view('employer-applicants-jobs');  
    }
    
    public function employerShortlistCandidates()
    {
        return view('employer-shortlist-candidates');  
    }

    public function employerPackage()
    {
        return view('employer-package');  
    }

    public function employerMessages()
    {
        return view('employer-messages');  
    }

    public function employerChangePassword()
    {
        return view('employer-change-password');  
    }

    public function employerDeleteAccount()
    {
        return view('employer-delete-account');  
    }

    public function aboutUs()
    {
        return view('about-us');  
    }
    
    public function notFound()
    {
        return view('404');  
    }

    public function checkout()
    {
        return view('checkout');  
    }

    public function blog()
    {
        return view('blog');  
    }

    public function blogDetail()
    {
        return view('blog-detail');  
    }

    public function privacy()
    {
        return view('privacy');  
    }

    public function pricing()
    {
        return view('pricing');  
    }

    public function faq()
    {
        return view('faq');  
    }

    public function contact()
    {
        return view('contact');  
    }

    public function help()
    {
        return view('help');  
    }

    public function jobDetail()
    {
        return view('job-detail');  
    }

    public function signup()
    {
        return view('signup');  
    }

    public function sliderHome()
    {
        return view('slider-home');  
    }

}

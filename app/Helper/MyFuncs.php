<?php

namespace App\Helper;

use App\Model\Minu;
use App\Model\SubMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MyFuncs {

    public static function full_name($first_name,$last_name) {
        // return $first_name . ', '. $last_name;   
        return $first_name . ', '. $last_name;   
    }
    function hello(){
    	return 'hello';
    }
   public static function conn(){
        $value = Session::get('databasename');
        return $value; 
    }

    

    public static function menus(){  
     $accountSubMenuUrls =[
        '1'=>'<li><a href="'.route('admin.account.role').'"><i class="fa fa-circle-o"></i> Default User Role </a></li>',
        '2'=>'<li><a href="'.route('admin.account.form').'"><i class="fa fa-circle-o"></i> Add User  </a></li>',
        '3'=>'<li><a href="'.route('admin.account.list').'"><i class="fa fa-circle-o"></i> List User </a></li>',
        '4'=>'<li><a href="'.route('admin.account.access').'"><i class="fa fa-circle-o"></i>Menu Assign</a></li>',
        '5'=>'<li><a href="'.route('admin.userClass.list').'"><i class="fa fa-circle-o"></i> Class Assign</a></li>'
        ];
        $adminId = Auth::guard('admin')->user()->id;               
        $accounResult = ''; 
            foreach($accountSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $accounResult.=$value;  
                }  
            }
     $masterSubMenuUrls =[
        '6'=>'<li><a href="'.route('admin.academicYear.list').'"><i class="fa fa-circle-o"></i> Academic Year </a></li>',
        '7'=>'<li><a href="'.route('admin.paymentMode.list').'"><i class="fa fa-circle-o"></i> Payment Mode</a></li>',
        '54'=>'<li><a href="'.route('admin.document.type').'"><i class="fa fa-circle-o"></i> Document Type</a></li>'
        ];
        $masterResult = ''; 
           foreach($masterSubMenuUrls as $key => $value)
           {
               foreach (Minu::where('admin_id',$adminId)
                       ->where('sub_menu_id',$key)->get() as $subMenu) { 
                         $masterResult.=$value;  
               }  
           } 
     $studentSubMenuUrls =[
        '7'=>'<li><a href="'.route('admin.student.form').'"><i class="fa fa-circle-o"></i> Add</a></li>',
        '8'=>'<li><a href="'.route('admin.student.show').'"><i class="fa fa-circle-o"></i> Show</a></li>',
        '9'=>'<li><a href="'.route('admin.student.excel.import').'"><i class="fa fa-circle-o"></i> Excel Import</a></li>'
        ];
        $studentResult = ''; 
            foreach($studentSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $studentResult.=$value;  
                }  
            }
    $financeSubMenuUrls =[
        '10'=>'<li><a href="'.route('admin.feeAcount.list').'"><i class="fa fa-circle-o"></i>Fee Accounts </a></li>',
        '11'=>'<li><a href="'.route('admin.feeStructure.list').'"><i class="fa fa-circle-o"></i>Fee Structure </a></li>',
        '12'=>'<li><a href="'.route('admin.feeStructureAmount.list').'"><i class="fa fa-circle-o"></i>Fee Structure Amount </a></li>',
        '13'=>'<li><a href="'.route('admin.feeStructureLastDate.list').'"><i class="fa fa-circle-o"></i>Fee Structure Last Date </a></li> ',
        '14'=>'<li><a href="'.route('admin.fineScheme.list').'"><i class="fa fa-circle-o"></i>Fee Fine Scheme </a></li> ',
        '15'=>'<li><a href="'.route('admin.classFeeStructureForm').'"><i class="fa fa-circle-o"></i> Class Fee Structure Form </a></li>',
        '16'=>'<li><a href="'.route('admin.feeGroup.list').'"><i class="fa fa-circle-o"></i>Fee Group </a></li>',
        '17'=>'<li><a href="'.route('admin.feeGroupDetail.list').'"><i class="fa fa-circle-o"></i>Fee Group Detail </a></li>',
        '18'=>'<li><a href="'.route('admin.concession.list').'"><i class="fa fa-circle-o"></i>Concession </a></li>',
        '19'=>'<li><a href="'.route('admin.studentFeeDetail.list').'"><i class="fa fa-circle-o"></i>Student Fee Detail </a></li>',
        '20'=>'<li><a href="'.route('admin.studentFeeGroupDetail.list').'"><i class="fa fa-circle-o"></i>Fee Group Wise </a></li>',
        '21'=>'<li><a href="'.route('admin.studentFeeAssign.list').'"><i class="fa fa-circle-o"></i> Student Fee Assign </a></li>',
        '22'=>'<li><a href="'.route('admin.studentFeeCollection.list').'"><i class="fa fa-circle-o"></i> Fee Collection </a></li>',
        '23'=>'<li><a href="'.route('admin.cashbook.list').'"><i class="fa fa-circle-o"></i> Cashbook </a></li>',
        '24'=>'<li><a href="'.route('admin.feeDue.list').'"><i class="fa fa-circle-o"></i> Fee Due List </a></li>',  
        ]; 
        $financeResult = ''; 
            foreach($financeSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $financeResult.=$value;  
                }  
            }  

    $reportSubMenuUrls =[
        '25'=>'<li><a href="'.route('admin.student.report').'"><i class="fa fa-circle-o"></i> Student Report</a></li>',
        ];
        $reportResult = ''; 
            foreach($reportSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $reportResult.=$value;  
                }  
            }

    $manageSubMenuUrls =[
        '26'=>'<li><a href="'.route('admin.class.list').'"><i class="fa fa-circle-o"></i> Add Class</a></li>',
        '27'=>'<li><a href="'.route('admin.section.list').'"><i class="fa fa-circle-o"></i> Add Section</a></li>',
        '28'=>'<li><a href="'.route('admin.manageSection.list').'"><i class="fa fa-circle-o"></i> Class Section</a></li>'
        ];
        $manageResult = ''; 
            foreach($manageSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $manageResult.=$value;  
                }  
            }

    $subjectSubMenuUrls =[
        '29'=>'<li><a href="'. route('admin.subjectType.list').'"><i class="fa fa-circle-o"></i> Subjects</a></li>',
        '30'=>'<li><a href="'. route('admin.subject.manageSubject').'"><i class="fa fa-circle-o"></i> Class Subject </a></li>', 
        ];
        $subjectResult = ''; 
            foreach($subjectSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $subjectResult.=$value;  
                }  
            }

    $homeworkSubMenuUrls =[
        '31'=>'<li><a href="'. route('admin.homework.list').'"><i class="fa fa-circle-o"></i> List </a></li>',];
        $homeworkResult = ''; 
            foreach($homeworkSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $homeworkResult.=$value;  
                }  
            } 

     $attendanceSubMenuUrls =[
        '32'=>'<li><a href="'. route('admin.attendance.student.form').'"><i class="fa fa-circle-o"></i> Student </a></li> ',];
        $attendanceResult = ''; 
            foreach($attendanceSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $attendanceResult.=$value;  
                }  
            } 

    $certificateIssuSubMenuUrls =[
        '33'=>'<li><a href="'. route('admin.student.certificateIssu.apply').'"><i class="fa fa-circle-o"></i> Apply </a></li> ',
        '34'=>'<li><a href="'. route('admin.student.certificateIssu.list').'"><i class="fa fa-circle-o"></i> Apply List </a></li> ',
    ];
        $certificateIssuResult = ''; 
            foreach($certificateIssuSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $certificateIssuResult.=$value;  
                }  
            } 

    $feeCertificateSubMenuUrls =[
        '35'=>'<li><a href="'. route('admin.student.certificateIssu.tuition').'"><i class="fa fa-circle-o"></i> Tuition Fee </a></li> ',
        
    ];
        $feeCertificateResult = ''; 
            foreach($feeCertificateSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $feeCertificateResult.=$value;  
                }  
            } 

    $activityListSubMenuUrls =[
        '36'=>'<li><a href="'. route('admin.student.certificateIssu.tuition').'"><i class="fa fa-circle-o"></i> Activity List </a></li> ',
        ];
        $activityListResult = ''; 
            foreach($activityListSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $activityListResult.=$value;  
                }  
            }  

    $registrationFormSubMenuUrls =[
        '37'=>'<li><a href="'. route('admin.onlineForm.list').'"><i class="fa fa-circle-o"></i> List</a></li> ', 
        ];
        $registrationFormResult = ''; 
            foreach($registrationFormSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $registrationFormResult.=$value;  
                }  
            }   

     $transportSubMenuUrls =[
        '38'=>'<li><a href="'. route('admin.transport.list').'"><i class="fa fa-circle-o"></i> Transport</a></li>', 
        '39'=>'<li><a href="'. route('admin.vehicle.list').'"><i class="fa fa-circle-o"></i> Vehicle</a></li>', 
        '40'=>'<li><a href="'. route('admin.vehicleType.list').'"><i class="fa fa-circle-o"></i> Vehicle Type</a></li>', 
        '41'=>'<li><a href="'. route('admin.driver.list').'"><i class="fa fa-circle-o"></i> Driver</a></li>', 
        '42'=>'<li><a href="'. route('admin.helper.list').'"><i class="fa fa-circle-o"></i> Helper</a></li> ', 
        '43'=>'<li><a href="'. route('admin.boardingPoint.list').'"><i class="fa fa-circle-o"></i>  Boarding Point</a></li> ', 
        '44'=>'<li><a href="'. route('admin.route.list').'"><i class="fa fa-circle-o"></i> Route</a></li>', 
        '45'=>'<li><a href="'. route('admin.routeDetails.list').'"><i class="fa fa-circle-o"></i> Route Details</a></li>', 
        '46'=>'<li><a href="'. route('admin.routeVehicle.list').'"><i class="fa fa-circle-o"></i> Route Vehicle</a></li>', 
        '47'=>'<li><a href="'. route('admin.transportRegistration.list').'"><i class="fa fa-circle-o"></i> Transport Registration</a></li>', 
      
        
        ];
        $transportResult = ''; 
            foreach($transportSubMenuUrls as $key => $value)
            {
                foreach (Minu::where('admin_id',$adminId)
                        ->where('sub_menu_id',$key)->get() as $subMenu) { 
                          $transportResult.=$value;  
                }  
            } 

    $examSubMenuUrls =[
       '48'=>'<li><a href="'. route('admin.exam.test').'"><i class="fa fa-circle-o"></i> Class Test</a></li>',  
       '49'=>'<li><a href="'. route('admin.exam.test.details').'"><i class="fa fa-circle-o"></i> Class Test Details</a></li> ',  
       '50'=>'<li><a href="'. route('admin.exam.term').'"><i class="fa fa-circle-o"></i> Exam Term  </a></li>',  
       '51'=>'<li><a href="'. route('admin.exam.schedule').'"><i class="fa fa-circle-o"></i> Exam Schedule</a></li>',  
       '52'=>'<li><a href="'. route('admin.exam.mark.detail').'"><i class="fa fa-circle-o"></i> Exam Marks Details  </a></li>',  
       '53'=>'<li><a href="'. route('admin.exam.grade.detail').'"><i class="fa fa-circle-o"></i>Grade Details   </a></li>'  
        
       ];
       $examResult = ''; 
           foreach($examSubMenuUrls as $key => $value)
           {
               foreach (Minu::where('admin_id',$adminId)
                       ->where('sub_menu_id',$key)->get() as $subMenu) { 
                         $examResult.=$value;  
               }  
           }                                                          

    	$urls=[ 
     		 
     		'1'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-danger"></i>
                    <span>User Access</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     '.$accounResult.'              
                                   
                </ul>
            </li>',
     		'2'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear text-info"></i>
                    <span>Configration</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"> 
                '.$masterResult.'
                '.$manageResult.'
                '.$subjectResult.'
                </ul>
            </li> ',
            '3'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-warning"></i>
                    <span>Student</span>
                    <span class="pull-right-container">
                      
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                 '.$studentResult.' 
                 '.$reportResult.' 
                </ul>
            </li>',
            '4'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-rupee text-danger"></i>                
                    <span>Finance</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li></li>
                     '.$financeResult.' 
                </ul>
            </li>',
            // '5'=>' <li class="treeview">
            //     <a href="#">
            //         <i class="fa fa-sticky-note text-primary"></i>
            //         <span>Report</span>
            //         <span class="pull-right-container">                      
            //           <i class="fa fa-angle-left pull-right"></i>
            //         </span>
            //     </a>
            //     <ul class="treeview-menu">
            //        '.$reportResult.' 
            //     </ul>
            // </li>',
            // '6'=>' <li class="treeview">
            //     <a href="#">
            //         <i class="fa fa-cogs text-danger"></i>
            //         <span>Manage</span>
            //         <span class="pull-right-container">
            //           <i class="fa fa-angle-left pull-right"></i>
            //         </span>
            //     </a>            
            //     <ul class="treeview-menu">
                   
            //     </ul>
            // </li>   ',
            // '7'=>' <li class="treeview">
            //     <a href="#">
            //         <i class="fa fa-book text-info"></i>
            //         <span>Subject</span>
            //         <span class="pull-right-container">
            //           <i class="fa fa-angle-left pull-right"></i>
            //         </span>
            //     </a>
            //     <ul class="treeview-menu">
            //         '.$subjectResult.'
            //     </ul>
            // </li>',
              '8'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-primary"></i>
                    <span>Homework</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    '.$homeworkResult.'  
                </ul>
            </li>',
              '9'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-clock-o text-success"></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   '.$attendanceResult.'
                </ul>
            </li>',
              '10'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-danger"></i>
                    <span>Certificate Issue</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  '.$certificateIssuResult.'
                </ul>
            </li>',
              '11'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-danger"></i>
                    <span>Fee Certificate</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   '.$feeCertificateResult.'
                     
                </ul>
            </li>',
              '12'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-users text-warning"></i>
                    <span>User Activity</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    '.$activityListResult.'              
                    
                </ul>
            </li>',
              '13'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-users text-warning"></i>
                    <span>Registration Form</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                 '.$registrationFormResult.'             
                    
                </ul>
            </li>',
            '14'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-bus text-info"></i>
                    <span>Transport</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     '.$transportResult.'          
                    
                </ul>
            </li>',
              '15'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-sticky-note text-warning"></i>
                    <span>Exam</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                 '.$examResult.'
                </ul>
            </li>',
     		 
    		]; 
    	foreach ($urls as $key => $value) {
    	
    		foreach (Minu::where('admin_id',Auth::guard('admin')->user()->id)
                    ->where('minu_id',$key)->distinct()
                    ->get(['minu_id']) as $menu) {
    			 
    		  	   echo $value;
    		      
		    } 
    	}
    	
    }
}
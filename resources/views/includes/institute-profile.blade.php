<?php
    $affiliation_status = 0;
    if(Auth::user()->nUsrRoleID == 1003){
        $affiliation_status = DB::table('tbltakinstituteaffiliation')
            ->where('nTrainerID', Auth::user()->ausrid)
            ->where('naffiliationstatus',1)
            ->first();
    } else if(Auth::user()->nUsrRoleID == 1002){        
        $affiliation_status = DB::table('tbltakinstituteaffiliation')
                ->join('tblinstitutemaster','tblinstitutemaster.aInstituteID','=','tbltakinstituteaffiliation.nInstituteid')
                ->where('tblinstitutemaster.nInstituteMgrIncharge',Auth::user()->ausrid)
                ->where('naffiliationstatus',1)
                ->first();
    }
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script>
   $(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
 </script>
 <script type="text/javascript" src="/assets/timepicker/wickedpicker.js"></script>
 <link rel="stylesheet" href="/assets/timepicker/stylesheets/wickedpicker.css">
 
<div class="container-fluid bg-primary-color course-highlight">
    <div class="row">
        <div class="container">
            <div class="col-md-7">
                <p class="course-title-big">Settings</p>            
            </div>            
        </div>
    </div>
</div>

<div class="container-fluid cbc profileTemp">
    <div class="row">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/')}}">Home</a></li>
                <li class="active">Settings</li>
            </ol>
        </div>
    </div>
    <div class="row">
      <div  class="container">
      <div class="col-md-3">      
          <div class="subCategoriesBlk studentProfile">			
			 <h2>Admin</h2>
            <ul>
			 <?php if( Auth::user()->nUsrRoleID == 1003 || Auth::user()->nUsrRoleID == 1002 || Auth::user()->nUsrRoleID == 1006 ): ?>
                <li><a href="dashboardtab">Dashboard</a><span>Reports </span></li>
			 <?php endif; ?>
            <?php if(Auth::user()->nUsrRoleID != 1004): ?>
                <li><a href="tsSubscriptions">Contracts</a><span>List of Active and Expired Contract  </span></li>
            <?php endif; ?>
            <?php if(Auth::user()->nUsrRoleID == 1001 || Auth::user()->nUsrRoleID == 1002 || Auth::user()->nUsrRoleID == 1006): ?>
                <li><a href="tsCallBack">Call Back’s and Appointments</a><span>Inquiry request from Students against your Courses..</span></li>
            <?php endif; ?>
			<li><a href="trainingcalendertab">Training Calender</a><span>List of Training Scheduled </span></li>
            <?php if(Auth::user()->nUsrRoleID == 1004 ): ?>
            <li><a href="tsSubscriptions">Enrolments </a>
              	<span>Please find your list of all your Enrolments till date through Buddhijeevi.com</span>
            </li>
			   <?php   endif; ?>
			   <?php if(Auth::user()->nUsrRoleID == 1002 || Auth::user()->nUsrRoleID == 1003): ?>
              <li style="display:none"><a href="tsBilling">Billing</a>
              <span>Please provide your payment method to have an active subscription with us.</span>
              </li>
			  
<!--              <li><a href="tsTax">Identification/Tax Settings</a><span>Please provide us your PAN information.</span></li>-->
         
			  	 <?php   endif; ?>
            </ul>			  
            <h2>User Information</h2>
            <ul>
              <li><a href="tsProfileBox">Basic Information</a>
              <span>Please verify and confirm your basic user information. Thank you!</span>
              </li>
            
              <li><a href="tsAddressBox">Address</a><span>Please confirm your communication address. Thank you!</span></li>
              <li><a href="tsEducationBox">Education Information</a><span>Providing your education information will enable us to serve you even better. Thank you!</span></li>
              <li ><a href="tsWorkExpBox">Work Experience</a><span>Your Work experience will highlight your profile. Thank you!</span></li>
<!--               <li><a href="tsUI">Identity Information</a>
              
              <span>These information will help us to recommend you with any eligible government benefits!</span>
              </li>-->
                 <li><a href="tsResetPassword">Password</a>
              <span>Please Reset your new password. Thank you!</span>
              </li>
            </ul>
            
             <h2>Role</h2>
            <ul>
			  <li><a href="tsAddInformation">Profile Information</a>
              
              <span></span>
              </li>
            <?php if(Auth::user()->nUsrRoleID == 1002 || Auth::user()->nUsrRoleID == 1003): ?>
              <li><a href="tsStudent">Profile Type</a>
              	<span>Please update your correct Training Institure address information!</span>
              </li> 
			   <?php endif; ?>
			<?php if(Auth::user()->nUsrRoleID == 1002): ?>			  
				<li><a href="Classrooms">Classrooms</a>
				<span></span>
			  </li>               
			  <li><a href="tsFacilitiesAvl">Facilities Available</a>
              <span>Please select from the list on the facilities available for the Student willing to be trained under you.</span>
              </li>
			  
              <?php endif; ?>
              
              
            </ul>
           
           
		
          </div>
        
      </div>
      <div class="col-md-9">
        <div class="takshaInfo">
       
          
          	<ul class="tsFormList">
 <?php if( Auth::user()->nUsrRoleID == 1003 || Auth::user()->nUsrRoleID == 1002 ||  Auth::user()->nUsrRoleID == 1006 ): ?>           
		   <li  class="dashboardtab profileList" >
				<h3>Dashboard</h3>
				<div class="col-md-12">
			<p>Available Soon</p>
			</div>
			</li>
			<?php endif; ?>
			   <li class="trainingcalendertab profileList">
			<h3>Training Calender</h3>
<div class="col-md-12">
			<p>Available Soon</p>
			</div>
		   </li>
            <li class="tsSubscriptions profileList">
				 
               <?php if(Auth::user()->nUsrRoleID < 1004 || Auth::user()->nUsrRoleID == 1006): ?>   
              
             <h3>Contracts</h3>   
             
             <div class="col-md-12">
              <h4>Expired Contract</h4>

              <div class="enrollCol subscriptionList">
             	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="infoTable">
                  <tr>
                    <th valign="top">Contract ID</th>
                    <th valign="top">Contract Type</th>
                    <th valign="top">Start Date</th>
                    <th valign="top">End Date</th>
                    <th valign="top">Status</th>
                    <!--<th valign="top">Total Training Batche Eligible (No.)</th>
                    <th valign="top">Total Training Batches created (No.)</th>-->
                    <th valign="top">Purchase Order No</th>
                    <th valign="top">Sales Order No</th>
                    <th valign="top">Amount</th>
                  </tr>
                  <?php

                    $userId = Auth::user()->ausrid; 
					
                    $getInstitution = DB::table('tblinstitutemaster')
                                            ->where('nInstituteMgrIncharge', '=', $userId)                                            
                                            ->get();
                    if($getInstitution && Auth::user()->nUsrRoleID != 1003 &&  Auth::user()->nUsrRoleID != 1006){
                      foreach($getInstitution as $institution){
                        $instituteId  = $institution->aInstituteID;
                      }

                      $inactiveContracts = DB::table('tbltakinstituteaffiliation')
                                              ->join('tblcontract', 'tblcontract.aContractID', '=', 'tbltakinstituteaffiliation.ncontractid')
                                              ->whereDate('tbltakinstituteaffiliation.denddate', '<' , date('Y-m-d'))
                                              ->where('tbltakinstituteaffiliation.nInstituteid', '=',$instituteId)
                                              ->get();               

                  ?>

                  @foreach($inactiveContracts as $inactive)
                    <tr>
                    <td valign="top">{{$inactive->atakaffiliationid}}</td>
                    <td valign="top">{{$inactive->tContractName}}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($inactive->dstartdate)->format('d/m/Y') }}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($inactive->denddate)->format('d/m/Y') }}</td>
                    <td valign="top" class="orange">Expired</td>
                    <td valign="top">{{$inactive->tPurchaseorder ?: 'Purchase order not available'}}</td>
                    <td valign="top">{{$inactive->tSalesOrder ?: 'Sales order not available'}}</td>
                    <td valign="top">Rs {{$inactive->nContractValue}}/-</td>
                  </tr>
                  @endforeach
                  <?php } else if(!$getInstitution && (Auth::user()->nUsrRoleID == 1003 || Auth::user()->nUsrRoleID == 1006)) {
                      
                    $inactiveContracts = DB::table('tbltakinstituteaffiliation')
                        ->join('tblcontract', 'tblcontract.aContractID', '=', 'tbltakinstituteaffiliation.ncontractid')
                        ->whereDate('tbltakinstituteaffiliation.denddate', '<' , date('Y-m-d'))
                        ->where('tbltakinstituteaffiliation.nTrainerid', '=',$userId)
                        ->get(); 
                  ?>
                    @foreach($inactiveContracts as $inactive)
                        <tr>
                            <td valign="top">{{$inactive->atakaffiliationid}}</td>
                            <td valign="top">{{$inactive->tContractName}}</td>
                            <td valign="top">{{ Carbon\Carbon::parse($inactive->dstartdate)->format('d/m/Y') }}</td>
                            <td valign="top">{{ Carbon\Carbon::parse($inactive->denddate)->format('d/m/Y') }}</td>
                            <td valign="top" class="orange">Expired</td>
                            <td valign="top">{{$inactive->tPurchaseorder ?: 'Purchase order not available'}}</td>
                            <td valign="top">{{$inactive->tSalesOrder ?: 'Sales order not available'}}</td>
                            <td valign="top">Rs {{$inactive->nContractValue}}/-</td>
                          </tr>
                      @endforeach
                  <?php } ?>
                </table>
             </div>
             
             
             <h4>Active Contract</h4>
             <div class="enrollCol subscriptionList">
             	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="infoTable">
                  <tr>
                    <th valign="top">Contract ID</th>
                    <th valign="top">Contract Type</th>
                    <th valign="top">Start Date</th>
                    <th valign="top">End Date</th>
                    <th valign="top">Status</th>
                    <!--<th valign="top">Training Batches Eligible (No.)</th>
                    <th valign="top">Training Batches created (No.)</th>-->
                    <th valign="top">Purchase Order No</th>
                    <th valign="top">Sales Order No</th>
                    <th valign="top">Amount</th>
                  </tr>

                  <?php 

                    if($getInstitution){

                     $activeContracts = DB::table('tbltakinstituteaffiliation')
                                              ->join('tblcontract', 'tblcontract.aContractID', '=', 'tbltakinstituteaffiliation.ncontractid')
                                              ->whereDate('tbltakinstituteaffiliation.denddate', '>=' , date('Y-m-d'))                                            
                                              ->where('tbltakinstituteaffiliation.nInstituteid', '=',$instituteId)
                                              ->get();

                  ?>


                  @foreach($activeContracts as $active)
                    <?php 

                        /*$activeBatches = DB::table('tbltrainingbatchmaster')
                                              ->whereDate('dTrainingBatchEndDate', '>=', date('Y-m-d'))
                                              ->where('nInstituteID',$active->nInstituteid)
                                              ->count();

                        $totalBatches = DB::table('tbltrainingbatchmaster')                                              
                                              ->where('nInstituteID',$active->nInstituteid)
                                              ->count();*/
                    ?>
                    <tr>
                    <td valign="top">{{$active->atakaffiliationid}}</td>
                    <td valign="top">{{$active->tContractName}}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($active->dstartdate)->format('d/m/Y') }}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($active->denddate)->format('d/m/Y') }}</td>
                    <td valign="top" class="green">Active</td>
                    <!--<td valign="top"><?php //echo $activeBatches+1; ?></td>
                    <td valign="top"><?php //echo $totalBatches; ?></td>-->
                    <td valign="top">{{$active->tPurchaseorder ?: 'Purchase order not available'}}</td>
                    <td valign="top">{{$active->tSalesOrder ?: 'Sales order not available'}}</td>
                    <td valign="top">Rs {{$active->nContractValue}}/-</td>
                  </tr>
                  @endforeach
                  <?php } else if(!$getInstitution && (Auth::user()->nUsrRoleID == 1003 || Auth::user()->nUsrRoleID == 1006)) {
                      
                    $activeContracts = DB::table('tbltakinstituteaffiliation')
                        ->join('tblcontract', 'tblcontract.aContractID', '=', 'tbltakinstituteaffiliation.ncontractid')
                        ->whereDate('tbltakinstituteaffiliation.denddate', '>=' , date('Y-m-d'))                                            
                        ->where('tbltakinstituteaffiliation.nTrainerid', '=',$userId)
                        ->get();
                  ?>
                    @foreach($activeContracts as $active)
                    <tr>
                    <td valign="top">{{$active->atakaffiliationid}}</td>
                    <td valign="top">{{$active->tContractName}}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($active->dstartdate)->format('d/m/Y') }}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($active->denddate)->format('d/m/Y') }}</td>
                    <td valign="top" class="green">Active</td>
                    <td valign="top">{{$active->tPurchaseorder ?: 'Purchase order not available'}}</td>
                    <td valign="top">{{$active->tSalesOrder ?: 'Sales order not available'}}</td>
                    <td valign="top">Rs {{$active->nContractValue}}/-</td>
                  </tr>
                  @endforeach
                  <?php } ?>
                </table>
             </div>
             
             </div>
             
             <?php endif; ?>            
                <?php if(Auth::user()->nUsrRoleID == 1004 ): ?>       
             <h3>Subscriptions</h3>   
             
             <div class="col-md-12">
             
             <div class="enrollCol">
             	<ul>
                    <li class="first">Batch No:</li>
                    <li class="second">Enrollment Date</li>                    
                    <li>Institute/Trainer Name</li>
                    <li class="last">Feedback</li>
                </ul>
                <ul>
                    <li class="first">1</li>
                    <li class="green second">MM/DD/YYYY</li>                 
                    <li>Full Name</li>
                    <li class="last"><a href="#">Feedback</a></li>
                </ul>
 				 <ul>
                    <li class="first">2</li>
                    <li class="green second">MM/DD/YYYY</li>                 
                    <li>Full Name</li>
                    <li class="last"><a href="#">Feedback</a></li>
                </ul>   
 				 <ul>
                    <li class="first">3</li>
                    <li class="green second">MM/DD/YYYY</li>                 
                    <li>Full Name</li>
                    <li class="last"><a href="#">Feedback</a></li>
                </ul>                          
             	
             </div>
             
             </div>
             <?php endif; ?>
                    
                     
            
           </li>
        
		 <li  class="tsCallBack profileList">
                 
              
             <h3>Call Back’s and Appointments</h3>   
             
            
             <div class="col-md-12">
           
             	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="infoTable">
                  <tr>
                    <th valign="top">Lead ID</th>
                    <th valign="top">Batch Name</th>
                    <th valign="top">Course Name</th>
                    <th valign="top">Requested Date</th>
                    <th valign="top">Request Type</th>
                    <th valign="top">Appointment Date</th>
                    <th valign="top">Appointment Time</th>
                    <th valign="top">Student Full Name</th>
                    <th valign="top">Student Email</th>
                    <th valign="top">Student Mobile</th>
                    <th valign="top" width="20%">Request Comments</th>
                  </tr>


                   <?php
                      
                      $userId = Auth::user()->ausrid; 

                      $instuteDetailsObj = DB::table('tblinstitutemaster')
                                            ->where('nInstituteMgrIncharge', '=', $userId)                                            
                                            ->get();

                      if($instuteDetailsObj){
                      $instuteDetailsArray = json_decode(json_encode($instuteDetailsObj), True);
                      
                      $instituteId =  $instuteDetailsArray[0]['aInstituteID'];

                      $callbackRequests = DB::table('tblstudentcourseenquiry')
                                            ->join('tbltrainingbatchmaster', 'tbltrainingbatchmaster.aTrainingBatchMasterID', '=', 'tblstudentcourseenquiry.nBatchid')
                                            ->join('tblcoursecataloguemaster','tblcoursecataloguemaster.aCourseMasterID','=','tbltrainingbatchmaster.nCourseMasterid')
                                            ->join('tblusermaster','tblstudentcourseenquiry.nUserid','=','tblusermaster.ausrid')
                                            #->whereDate('tbltrainingbatchmaster.nInstituteID', '=' ,2)
                                            ->where('tbltrainingbatchmaster.nInstituteID','=',$instituteId)
                                            ->orderBy('tblstudentcourseenquiry.aEnquiryid','desc')
                                            ->get(); 
                  ?>

                 
                  @foreach($callbackRequests as $request)
                   <tr>
                    <td valign="top">{{$request->aEnquiryid}}</td>
                    <td valign="top">{{$request->tTrainingBatchName}}</td>
                    <td valign="top">{{$request->tCoursetitle}}</td>
                    <td valign="top">{{ Carbon\Carbon::parse($request->created_at)->format('d/m/Y') }}</td>                    
                    <td valign="top">{{$request->tEnquiryType}}</td>
                    <td valign="top">@if( $request->nScheduleTime >0) {{ Carbon\Carbon::parse($request->nScheduleDate)->format('d/m/Y') }}@endif</td>
                    <td valign="top">@if( $request->nScheduleTime >0) {{ Carbon\Carbon::parse($request->nScheduleTime)->format('H:m: A') }}@endif</td>
                    <td valign="top">{{$request->tUsrFName}} {{$request->tUsrLName}}</td>
                    <td valign="top"><a href="mailto:{{$request->tUsrEmail}}" title="{{$request->tUsrEmail}}">{{$request->tUsrEmail}}</a></td>
                    <td valign="top">{{$request->tUsrMobileNumber}}</td>
                    <td valign="top" width="20%">{{$request->tEnquiryComment}}</td>
                  </tr>
                @endforeach
                <?php } ?>
                </table>
                
                	<a href="#" title="Download File" class="downloadBtn">Download File</a>
               
                
             </div>
             <div class="col-md-12">
              <!--<p>pagination goes here</p>-->
             </div>
             
            
           </li>
		
<!--                <li class="tsTax profileList">
                   <form action="" method="" id="UpdatePAN" >                
               <h3>Identification/Tax Settings</h3>
               
               
               <div class="col-md-6">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<?php
					$pan = DB::table('tbluserinstidinfo')
					->where('nUsrID', Auth::user()->ausrid)
					->where('nIDMaster', 1)
					->first();
					if(isset($pan->tIDValue)){
						$pan_no = $pan->tIDValue;
					}else{
						$pan_no = '';
					}
				?>
                <div class="fields"> 
                    <label for="panNo" class="hide">Permanent Account Number (PAN):</label>
                    <input type="text" placeholder="Permanent Account Number (PAN):" value="{{$pan_no}}" id="panNo" name="panNo"  />
                </div>
            </div>
                 <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
               
                <div class="col-md-12">
                    <div class="fields submitFields">
                        <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                          <a class="goBackBtn" href="/account/profile">Cancel</a>
                    </div>
                </div>
               
             </form>
             </li>-->
            
            <li class="tsProfileBox profileList">
                
                <div class="col-md-12">
                    <p class="profile-img profile-pic">
                        @if(Auth::user()->nUsrRoleID == 1003)
                            @if($user->pImageFileName)
                               <?php echo '<img width="250" src="/assets/images/'.$user->pImageFileName.'" />' ?>
                            @else
                               <p>Profile pic not added yet ..</p>
                            @endif
                        @endif                        
                    </p>
                    @if(Auth::user()->nUsrRoleID == 1003 && !$affiliation_status)
                        
                    <div class="col-md-12" style="margin-bottom: 15px">
                            <p class="primary-color">Note:
                                <ol class="primary-color">
                                    <li>Please upload an image of (150px Width / 150px height) for a better view</li>
                                    <li>You may use MSPaint to modify the Image to the required resolution</li>
                                </ol>
                            </p>
                        </div>
                    <div class="col-md-12">
                        <input type="hidden" name="image_type" value="profile" id="image_type">
                        <div class="fields browseImage">
                            <input type="file" onchange="uploadImage(); return false" name="image" id="image_file" class="inputfile inputfile-6">
                            <label for="file-7"><span></span> <strong> Choose a file…</strong></label>
                        </div>
                    </div>
                        <div class="col-md-12">                                    
                            <p class="invalid-msg"></p>
                        </div>
                    @else
                        <input type="hidden" name="image" id="image_file" class="inputfile inputfile-6">
                    @endif 
                </div>
                
                <form action="" method="" id="BasicInformation">
                    <input type="hidden" value="{{ $user->pImageFileName }}" name="image_filename" class="image_filename"> 
                 <h3>Profile </h3>
            
             <div class="col-md-6">
             
              <div class="fields">
                <label for="fName" class="hide">First Name*</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" placeholder="First Name"  id="fName" name="fName" value="{{$user->tUsrFName}}" readonly=""/>
              </div>
             
             </div>
             
              <div class="col-md-6">
              
               <div class="fields">
                <label for="lName" class="hide">Last Name*</label>
                <input readonly="" type="text" placeholder="Last Name" value="{{$user->tUsrLName}}" id="lName" name="lName"  />
              </div>
              
              
             </div>
             
               <div class="col-md-12">
               
               <div class="fields radioRow">
              
                <label for="tsMale">Male
                <input type="radio" name="tsGender" id="tsMale" value="Male" <?php if($user->tUsrgender == 'Male'){ echo "checked"; } ?>/>
                </label>
                
                <label for="tsFemale">Female
                <input type="radio" name="tsGender" id="tsFemale" value="Female" <?php if($user->tUsrgender == 'Female'){ echo "checked"; } ?>/>
                </label>
                
              </div>
               
               </div>
             
            <div class="col-md-12">
            
            
            

             <div class="fields">
             
                <label for="tsEmail" class="hide">Email*</label>
               
               
             
                <div class="col-md-6 no-padding">
                    <input type="text" placeholder="Email" value="{{$user->tUsrEmail}}" id="tsEmail" name="tsEmail"  readonly />               
                </div>                
                <div class="col-md-3 smlTxt11">                  
                    <span class="glyphicon glyphicon-warning-sign text-success"></span><span>Verified</span>                
                </div>
                
                <div class="col-md-3 smlTxt11">    
                    <label for="tsNewsLetter" class="newsLetterLabel">
                    <input type="checkbox" name="tsNewsLetter" id="tsNewsLetter" value="1" <?php if($user->nNewsLetterSubscription == 1){ echo "checked"; }?>/> <span class="newsLetterTxt">Recieve Taskhashilaonline Newsletter</span>
                    </label>               
                </div>
             
             
              </div>  

           
                 
            </div>
            
            <div class="col-md-12">
            
             <div class="fields">
             
                <label for="fName" class="hide">Mobile*</label>
                  <div class="col-md-6 no-padding">
               		 <input type="text" placeholder="Mobile" maxlength="10" value="{{$user->tUsrMobileNumber}}" id="mobile" name="mobile"  />
               
             	</div>
                  <div class="col-md-6  smlTxt11">
                  
                   <span>Not Verified <a href="#" style="text-decoration:underline;">Click here for Verification</a></span>
                  
                  </div>
                  
              </div>

			</div>
            @if(Auth::user()->nUsrRoleID == 1003)
                <div class="col-md-12">
                    <div class="fields">
                        <div class=" no-padding">
                            <textarea rows="3" placeholder="Please fillup your profile summary" name="uProfileWriteup" id="profileSummary">{{$user->uProfileWriteup}}</textarea>
                        </div>
                    </div>
                </div> 
            @else
                <input type="hidden" name="uProfileWriteup" value="">
            @endif
            
           
                
        <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>   
                
        <div class="col-md-12">
            <div class="fields submitFields">
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
               <a class="goBackBtn" href="/account/profile">Cancel</a>
            </div>
        </div>      
            
            </form>
                
                </li>
                
               
                
                <li class="tsAddressBox profileList">
                
        <form action="" method="post" id="Address">
                   
                <h3>Address </h3>
            <div class="col-md-12">            
              <div class="fields">
                <label for="tsAddress1" class="hide">Address 1*</label>
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input  type="text" placeholder="Building Name/Apt.No, Street Name (Address1)" value="{{$user->tUsrBldName_StName_Add1}}" id="tsAddress1" name="tsAddress1" <?php echo ($affiliation_status && $user->tUsrBldName_StName_Add1) ? 'disabled': '' ?> />
              </div>            
            </div>           
            <div class="col-md-12">           
               <div class="fields">
                <label for="tsAddress1" class="hide">Address 2*</label>
                <input type="text" placeholder="Location/Blvd, Area (Address2)" value="{{$user->tUsrAve_Blvd_Add2}}" id="tsAddress2" name="tsAddress2" <?php echo ($affiliation_status && $user->tUsrAve_Blvd_Add2) ? 'disabled': '' ?> />
              </div>            
            </div>
            
            <div class="col-md-12">
              <div class="fields">
                <label class="hide">State*</label>
				<?php
					$States = DB::table('tbllocationmaster')->groupBy('tState_County')->get();
				?>
                <select class="dropdownq"  name="state" onChange="getDistrict(this.value); return false" <?php echo ($affiliation_status && $user->tUsrLocation) ? 'disabled': '' ?>>
                  <option value="">State</option>
				  @foreach($States as $State)
                  <option value="{{$State->tState_County}}" <?php if($State->aLocationID == $user->tUsrLocation){ echo "selected"; } ?> >{{$State->tState_County}}</option>
				  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="fields">
                <label class="hide">District*</label>
				
                <select class="dropdown1" name="locationid" id="district" <?php echo ($affiliation_status) ? 'disabled': '' ?>>
                  <option value="">District</option>
                </select>
              </div>
            </div>  
                     
            <div class="col-md-12">
                <div class="fields">
                    <label for="tsEmail" class="hide">Pincode*</label>
                    <input type="text" placeholder="Pincode" value="{{$user->tUsrPinZipCode}}" id="tsLocation" name="pincode" <?php echo ($affiliation_status && $user->tUsrPinZipCode) ? 'disabled': '' ?> />
                </div>
            </div>
                     
            <div class="col-md-12">
                <div class="fields">
                    <label for="tsEmail" class="hide">Google Location*</label>
                    <input type="text" placeholder="Location" value="{{$user->tGoogleLoc}}" id="tGoogleLoc" name="tGoogleLoc"  <?php echo ($affiliation_status && $user->tGoogleLoc) ? 'disabled': '' ?>/>
                </div>
            </div>
             <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
            <div class="col-md-12">
              <div class="fields submitFields">
               
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                 <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>
            
            </form>
                 
                </li>
                
                <li class="tsEducationBox profileList">
                
                   <form id="EducationInfo">
                  <h3>Education Information</h3>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
            	<div class="row">
                  <?php
			$edu_info = DB::table('tblusereduinfo')
					->join('tblinstitutemaster', 'tblusereduinfo.nInstitutionMasterID', '=', 'tblinstitutemaster.aInstituteID')
					->where('tblusereduinfo.nUsrID', Auth::user()->ausrid)
					->get();
			$required_field = 3 - count($edu_info);

					
				
			for( $i = 0; $i < count($edu_info); $i++ ){
				$degree = DB::table('tbldegreemaster')->get();
			?>      
                <input type="hidden" name="aUserEduInfo[]" value="<?php echo $edu_info[$i]->aUserEduInfo; ?>">
                 <div class="col-md-3">
             
            <div class="fields">
                <label  class="hide">Basic/Graduation*</label>
				
                <select class="dropdown1" id="degreeId" name="degree[]" >				
                    <option value="">Degree</option>    
                   @foreach($degree as $degree)
				  <option value="{{$degree->aDegreeID}}" <?php if($degree->aDegreeID == $edu_info[$i]->nDegreeid){ echo "selected";  }  ?> >{{$degree->tDegree}}</option>
				  @endforeach
                </select>
            </div>
              
              </div>
              
              
               <div class="col-md-3">
              
              	<div class="fields">
                	    <label  class="hide">University Name*</label>
                             <input type="text" placeholder="University Name" value="<?php echo $edu_info[$i]->tInstituteName; ?>" id="insName" name="insName[]"  />
                    
                </div>
              
              
              </div>
              
              
              
              <div class="col-md-3">
              	<div class="fields">
                	<label class="hide">Year*</label>
                       <select class="dropdown1" id="yearOfCompletion" name="year_of_passing[]">				
                    <option value="">Year Of Passing</option>    
                   <?php $start_year = 1977; for( $y = 0; $y+$start_year <= date("Y"); $y++ ) { ?>
				  <option value="<?php echo $start_year+ $y; ?>"  <?php if($start_year+ $y == $edu_info[$i]->nYearofPassing){ echo "selected"; }  ?>><?php echo $start_year+ $y; ?></option>
				   <?php } ?>
                </select>
                    
                </div>
               </div> 
               
               
               <div class="col-md-3">
              
              	<div class="fields">
                	<label  class="hide">Grade</label>
                    <?php $grade = DB::table('tblgrademaster')->get(); ?>
                    <select class="dropdown1" id="gradeId" name="grade[]"> 
                    	
                        <option value="">Grade</option>
                    	 @foreach($grade as $grade)
				  <option value="{{$grade->aGradeid}}" <?php if($grade->aGradeid == $edu_info[$i]->nUsrCGPA){ echo "selected"; }  ?>>{{$grade->tGrade}}</option>
				  @endforeach
                        
                     </select>
                    
                </div>
              
              </div>
              <?php	} 		?>
			<?php for( $j = 0; $j < $required_field; $j++ ) {
	$degree = DB::table('tbldegreemaster')->get();
			?>
                 <div class="col-md-3">
             
            <div class="fields">
                <label  class="hide">Basic/Graduation*</label>
                <select class="dropdown1" id="degreeId" name="degree[]" >				
                    <option value="">Degree</option>    
                   @foreach($degree as $degree)
				  <option value="{{$degree->aDegreeID}}" >{{$degree->tDegree}}</option>
				  @endforeach
                </select>
            </div>
              
              </div>
              
              
               <div class="col-md-3">
              
              	<div class="fields">
                	    <label  class="hide">University Name*</label>
                             <input type="text" placeholder="University Name" value="" id="insName" name="insName[]"  />
                    
                </div>
              
              
              </div>
              
              
              
              <div class="col-md-3">
              	<div class="fields">
                	<label class="hide">Year*</label>
                       <select class="dropdown1" id="yearOfCompletion" name="year_of_passing[]">				
                    <option value="">Year Of Passing</option>    
                   <?php $start_year = 1977; for( $y = 0; $y+$start_year <= date("Y"); $y++ ) { ?>
				  <option value="<?php echo $start_year+ $y; ?>" ><?php echo $start_year+ $y; ?></option>
				   <?php } ?>
                </select>
                    
                </div>
               </div> 
               
               
               <div class="col-md-3">
              
              	<div class="fields">
                	<label  class="hide">Grade</label>
                    <?php $grade = DB::table('tblgrademaster')->get(); ?>
                    <select class="dropdown1" id="gradeId" name="grade[]"> 
                    	
                        <option value="">Grade</option>
                    	 @foreach($grade as $grade)
				  <option value="{{$grade->aGradeid}}" >{{$grade->tGrade}}</option>
				  @endforeach
                        
                     </select>
                    
                </div>
              
              </div>
                 <?php	} 		?>
                
                </div>
            </div>
                      <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
                
                <div class="col-md-12">
              <div class="fields submitFields">
               
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                  <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>
            
            </form>
                
                </li>
                
                <li class="tsWorkExpBox profileList">
                   <form action="" id="WorkExp" method="POST" onsubmit="submitWorkExp(); return false">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <h3>Work Experience</h3>
              
              
		<!--block 1-->
		<div class="col-md-12">
		<?php
			$tbluserworkexp = DB::table('tbluserworkexp')
					->where('nUsrID', Auth::user()->ausrid)
					->get();
			$required_field = 4 - count($tbluserworkexp);

			$tbIndustrySector = DB::table('tblIndustrysector')
					->get();
				
			for( $i = 0; $i < count($tbluserworkexp); $i++ ){
		?>
			<div class="row WorkExperience dd">
				<div class="col-md-2">
				<div class="fields">
					<input type="text" value="<?php if( date("Y/m/d", strtotime($tbluserworkexp[$i]->tUsrExpFrom)) != '1970/01/01' ){ echo date("Y/m/d", strtotime($tbluserworkexp[$i]->tUsrExpFrom)); } ?>" placeholder="From Date" name="exp_from[]" class="datepicker form-control" >	
					</div>
				</div>
				<div class="col-md-2">
				<div class="fields">
					<input type="text" value="<?php if( date("Y/m/d", strtotime($tbluserworkexp[$i]->tUsrExpTo)) != '1970/01/01' ){ echo date("Y/m/d", strtotime($tbluserworkexp[$i]->tUsrExpTo)); } ?>" placeholder="To Date" name="exp_to[]" class="datepicker form-control" >	
					</div>
				</div>
				<div class="col-md-3">
					<div class="fields">
					<label for="ioName" class="hide">Institute/Organisation Name*</label>
					<input type="text" placeholder="Institute/Organisation Name" value="<?php echo $tbluserworkexp[$i]->tUsrExpInstitution; ?>" name="exp_ins[]"  >
					</div>
				</div>

				<div class="col-md-2">                          
				<div class="fields">
				<label for="designation" class="hide">Designation*</label>
				<input type="text" placeholder="Designation" value="<?php echo $tbluserworkexp[$i]->tUsrWorkExpDesignation; ?>" id="designation" name="exp_designation[]"   />
				</div>                          
				</div>

				<div class="col-md-3">
				<div class="fields">
				<label for="sector" class="hide">Sector*</label>
				<select id="sector" name="exp_sector[]"  >  
				<option value="">Sector</option>
				<?php foreach( $tbIndustrySector as $key_sector=>$value_sector ) { ?>
				<option value="<?php echo $value_sector->aISid; ?>" <?php if( $tbluserworkexp[$i]->tUsrWorkExpSector == $value_sector->aISid ){ echo "selected"; } ?>><?php echo $value_sector->sectorName; ?></option>
				<?php } ?>
				</select>
				</div>
				</div>
			</div>
			<?php } ?>
			<?php	for( $i = 0; $i < $required_field; $i++ ){ ?>
			<div class="row WorkExperience">
				<div class="col-md-2">
				<div class="fields">
					<input type="text" placeholder="From Date" name="exp_from[]" class="datepicker form-control" >	
					</div>
				</div>
				<div class="col-md-2">
				<div class="fields">
					<input type="text" placeholder="To Date" name="exp_to[]" class="datepicker form-control" >	
					</div>
				</div>
				<div class="col-md-3">
					<div class="fields">
					<label for="ioName" class="hide">Institute/Organisation Name*</label>
					<input type="text" placeholder="Institute/Organisation Name" value="" name="exp_ins[]"  >
					</div>
				</div>

				<div class="col-md-2">                          
				<div class="fields">
				<label for="designation" class="hide">Designation*</label>
				<input type="text" placeholder="Designation" value="" id="designation" name="exp_designation[]"   />
				</div>                          
				</div>

				<div class="col-md-3">
				<div class="fields">
				<label for="sector" class="hide">Sector*</label>
				<select id="sector" name="exp_sector[]"  >  
				<option value="">Sector</option>
				<?php foreach( $tbIndustrySector as $key_sector=>$value_sector ) { ?>
				<option value="<?php echo $value_sector->aISid; ?>"><?php echo $value_sector->sectorName; ?></option>
				<?php } ?>
				</select>
				</div>
				</div>
			</div>
			<?php } ?>
		</div>
           
            

            
             
                          
                       
                        
                        <div class="col-md-12">
              <div class="fields submitFields">
               <p class="ResponseMsg"></p>
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                  <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>
            
            </form>
            
                
                </li>
                
                 <li class="tsFacilitiesAvl profileList">
                 
                 <h3>Facilities Available</h3>
                 <!---->
                    <form action="" method="" id="FacilitiesAvailable" >
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <?php
					$facilities = DB::table('tbltrainingfacilities')->get();	
					?>
                    <div class="col-md-12">                 	
                       <div class="row">
							<?php $count = 0; ?>
							@foreach($facilities as $facility)
								  
								<?php if( ($count%3) == 0) {  ?>
								 <div class="col-md-4">
                        	<div class="col-md-12 no-padding">    
								<?php } ?>
							  <div class="fields">  
                                    <label for="">
                                        <input type="checkbox" value="{{$facility->atrainingfacilityid}}"  name="facility[]" 
										<?php 
										$fac = DB::table('tblinstitutefacilities')
										->where('nFacilityID', $facility->atrainingfacilityid)
										->where('nUserId', Auth::user()->ausrid)
										->get();
										if( count($fac) > 0 ){
											echo "checked";
										}
										?>
										> <span>{{$facility->tfacilityname}}</span>
                                    </label> 
                                 </div> 
								 <?php if( (($count + 1)%3) == 0) {  ?>
								 </div>
								 </div>
								<?php } ?>
								 <?php $count++; ?>
							@endforeach
                       </div>
                    </div>
			
                      <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
                    
                    <div class="col-md-12">
              <div class="fields submitFields">
               
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                  <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>
                 
                 <!---->
                  </form>
                 </li>
                <li class="Classrooms profileList">
					  <h3>Classrooms</h3>
					  
				<form id="submitClassroom" onsubmit="submitClassroom(); return false">	  
					   <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-12">
		<?php
			$tblusrclassroom = DB::table('tblUsrClassRoom')
					->where('user_id', Auth::user()->ausrid)
					->get();
			$required_field = 4 - count($tblusrclassroom);

		
				
			for( $i = 0; $i < count($tblusrclassroom); $i++ ){
		?>			
				<div class="row ">
				<div class="col-md-4">              
				<div class="fields">
				<input type="text" placeholder="Classroom Name" value="<?php echo $tblusrclassroom[$i]->classroom_name; ?>" name="classroom_name[]">                    
				</div> 
				</div> 
				<div class="col-md-4">
				<div class="fields">
				<select name="classroom_type[]">				
				<option value="">Classroom Type</option>   
				<option value="Practical Lab" <?php if($tblusrclassroom[$i]->classroom_type=='Practical Lab'){ echo "selected"; } ?>>Practical Lab</option>
				<option value="Theory" <?php if($tblusrclassroom[$i]->classroom_type=='Theory'){ echo "selected"; } ?>>Theory</option>
				</select>
				</div>
				</div> 
				<div class="col-md-4">
				<div class="fields">
				<input type="text" name="teaching_capacity[]" value="<?php echo $tblusrclassroom[$i]->classroom_capacity; ?>" placeholder="Teaching Capacity">
				</div>
				</div>             
				</div>
				
			<?php } ?>
			<?php	for( $i = 0; $i < $required_field; $i++ ){ ?>
			<div class="row ">
				<div class="col-md-4">              
				<div class="fields">
				<input type="text" placeholder="Classroom Name" value="" name="classroom_name[]">                    
				</div> 
				</div> 
				<div class="col-md-4">
				<div class="fields">
				<select name="classroom_type[]">				
				<option value="">Classroom Type</option>   
				<option value="Practical Lab">Practical Lab</option>
				<option value="Theory">Theory</option>
				</select>
				</div>
				</div> 
				<div class="col-md-4">
				<div class="fields">
				<input type="text" name="teaching_capacity[]" value="" placeholder="Teaching Capacity">
				</div>
				</div>             
				</div>
			<?php } ?>
		</div>
		

				
				
			<div class="col-md-12">
              <div class="fields submitFields">
               <p class="ResponseMsg"></p>
                <input type="submit" value="Save" alt="Save" name="save" class="blueBtn">
                  <a href="/account/profile" class="goBackBtn">Cancel</a>
              </div>
            </div>
			
			</form>
			
			
				</li>
                
                 
           
             <li class="tsResetPassword profileList">
                  <form action="" id="ResetPassword" >
                  
                     <h3>Reset Password</h3>
                     
                       <div class="col-md-12">            
                          <div class="fields">
                            <label for="tsOldPassword1" class="hide">Old Password*</label>
							 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="password" placeholder="Old Password" value="" id="tsOldPassword1" name="oldpassword"  />
                          </div>            
                        </div>           
                        <div class="col-md-12">           
                           <div class="fields">
                            <label for="tsNewPassword" class="hide">New Password*</label>
                            <input type="password" placeholder="New Password" value="" id="newpassword" name="newpassword"  />
                          </div>            
                        </div>
                         <div class="col-md-12">           
                           <div class="fields">
                            <label for="tsReenterPassword" class="hide">Reenter Password*</label>
                            <input type="password" placeholder="Reenter Password" value="" name="confirmpassword" id="confirmpassword"  />
                          </div>            
                        </div>   
  <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  						
                        <div class="col-md-12">
                            <div class="fields submitFields">
                                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                                <a class="goBackBtn" href="/account/profile">Cancel</a>
                            </div>
                        </div>      

                  
                  
                 </form>
                 </li>
          
           <li class="tsStudent profileList">
               <h3>Profile Type</h3>
            <div class="col-md-6">                          
            	<div class="fields">
                <label class="hide" for="tsStudent">Trainer/Institue*</label>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<?php 
				$role = '';
				if( $user->nUsrRoleID == 1002 ){
					$role = 'Training Institue';
				}elseif( $user->nUsrRoleID == 1003 ){
					$role = 'Trainer';
				}elseif( $user->nUsrRoleID == 1004 ){
					$role = 'Student';
				}elseif( $user->nUsrRoleID == 1006 ){
					$role = 'Affiliate User';
				}
				?>
                <input style="display:none" type="text" name="tsStudent" id="tsStudent" value="<?php echo $role; ?>" placeholder="Trainer/Training Institute Manager" disabled>
            	</div>                          
          	</div> 
            <form action="" id="TIInfo">           
				<input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
			<?php if(Auth::user()->nUsrRoleID == 1002): ?>
            <h3 class="noBackground">Institue Image</h3>
			<div class="col-md-12">
				<div class="profileBox img-responsive">
				</div>
				<p class="primary-color">Note:
				<ol class="primary-color">
				<li>Please upload an image whose width equal or more then 810px  and height equals or more then 562px for a better view</li>
				<li>You may use MSPaint to modify the Image to the required resolution</li>
				</ol>  
				</p>
			</div>
			<div class="col-md-12">
				<p class="loadingimage"></p>
				<div class="fields browseImage">
				<input type="file" onchange="uploadImage1(); return false" name="image" id="image_file" class="inputfile inputfile-6" />
				<label for="file-7"><span></span> <strong> Choose a file&hellip;</strong></label>
				</div>
				
			</div>
			<div class="col-md-12">                                    
				<p class="invalid-msg"></p>
			</div>
			  <h3 class="noBackground">Profile Writeup</h3>
			  <div class="col-md-12">  
				<textarea name="uProfileWriteup" class="form-control"><?php echo $user->uProfileWriteup; ?></textarea><br>
			  </div>
			
             <h3 class="noBackground">Training Institute Information</h3>
            
            
             <div class="col-md-12">    
            <p>Please provide us your Training Institute information. !</p>
            </div>
            <div class="col-md-12">                          
            	<div class="fields">
                <label for="tiName" class="hide">Name of the Institute*</label>
                <input type="text" placeholder="Name of the Institute" value="{{$user->tInstituteName}}" id="tiName" name="tiName" <?php echo ($affiliation_status && $user->tInstituteName) ? 'disabled': '' ?>  />
            	</div>                          
          	</div>
            
             <div class="col-md-12">            
              <div class="fields">
                <label for="ttAddress1" class="hide">Address 1*</label>
                <input type="text" placeholder="Building Name/Apt.No, Street Name (Address1)" value="{{$user->tInstituteStNameAdd1}}" id="insAddress1" name="insAddress1" <?php echo ($affiliation_status && $user->tInstituteStNameAdd1) ? 'disabled': '' ?> />
              </div>            
            </div>           
            <div class="col-md-6">           
               <div class="fields">
                <label for="ttAddress2" class="hide">Address 2*</label>
                <input type="text" placeholder="Location/Blvd, Area (Address2)" value="{{$user->tInstituteAreaBlvdAdd}}" id="insAddress2" name="insAddress2" <?php echo ($affiliation_status && $user->tInstituteAreaBlvdAdd) ? 'disabled': '' ?> />
              </div>            
            </div>
            
               <div class="col-md-6">
                <div class="fields">
                    <label for="tsEmail" class="hide">Pincode*</label>
                    <input type="text" placeholder="Pincode" value="{{$user->tInstitutePINZipCode}}" id="tsLocation" name="inspincode" <?php echo ($affiliation_status && $user->tInstitutePINZipCode) ? 'disabled': '' ?> />
                </div>
            </div>
            
               <div class="col-md-12">
                <div class="fields">
                    <label for="tsEmail" class="hide">Location*</label>
                    <input type="text" placeholder="Location" value="{{$user->tGoogleInsLoc}}" id="tGoogleInsLoc" name="tGoogleInsLoc" <?php echo ($affiliation_status && $user->tGoogleInsLoc) ? 'disabled': '' ?> />
                </div>
            </div>
             <div class="col-md-12">
              <div class="fields">
                <label class="hide">State*</label>
				<?php
					$allstates = DB::table('tbllocationmaster')->groupBy('tState_County')->get(); 
					 $loc = DB::table('tbllocationmaster')->where('aLocationID', $user->tInstituteLoc)->first();
					 if(isset($loc->tState_County)){
						 $tState_County = $loc->tState_County;
					 }else{
						  $tState_County = '';
					 }
				?>
                <select class="dropdownq"  name="insstate" onChange="getInsDistrict(this.value); return false" <?php echo ($affiliation_status && $tState_County) ? 'disabled': '' ?>>
                  <option value="">State</option>
				  @foreach($allstates as $State)
                  <option value="{{$State->tState_County}}" <?php if($State->tState_County == $tState_County){ echo "selected"; } ?>>{{$State->tState_County}}</option>
				  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="fields">
			  
			  <?php $dist = DB::table('tbllocationmaster')->where('tState_County', $tState_County)->groupBy('tDistrict')->get(); ?>
                <label class="hide">District*</label>
				
                <select class="dropdown1" name="inslocationid" id="insdistrict" <?php echo ($affiliation_status && $user->tInstituteLoc) ? 'disabled': '' ?>>
                  <option value="">District</option>
				  @foreach( $dist as $key=>$value )
				   <option value="{{$value->aLocationID}}" <?php if($value->aLocationID == $user->tInstituteLoc){ echo "selected"; } ?> >{{$value->tDistrict}}</option>
				  @endforeach
                </select>
              </div>
            </div>  
             <h3 class="noBackground">Affiliates</h3>
                
            <div class="col-md-12">
                <div class="fields">
                    <p>Describe your affiliates/partner if any </p>
                    <label for="summary"><i>Please separate every key word with a <strong class="green">;&nbsp;</strong></i></label>
					<?php
					$result = DB::table('tblusrinstskillprof')
					->where('nusrid', Auth::user()->ausrid)
					->get();
					$skillp	= array();				
					foreach($result as $value){
						$skillp[] = $value->tSkillDescription;
						
					}
					$summary = implode(';', $skillp);
					?>
                    <textarea name="affiliates" cols="5" rows="5" id="summary" maxlength="250"><?php echo $summary; ?></textarea>
                </div>
            </div>
           <?php endif; ?>
		   <?php if(Auth::user()->nUsrRoleID == 1003 || Auth::user()->nUsrRoleID == 1002): ?>
		   <?php
		   if( Auth::user()->nUsrRoleID == 1002 ){
			    $tblinstitutemaster = DB::table('tblinstitutemaster')
					->where('nInstituteMgrIncharge', Auth::user()->ausrid)
					->first();
				$open_time = $tblinstitutemaster->office_open_time;
				$close_time = $tblinstitutemaster->office_close_time;
				$trained_students_count = $tblinstitutemaster->trained_students_count;
		   }else{
			   $open_time = Auth::user()->service_open_time;
				$close_time = Auth::user()->service_close_time;
				$trained_students_count = Auth::user()->trained_student_count;
		   }
		   
		   ?>
		   <script>
   $(function() {
    $( ".timepicker1" ).wickedpicker({ now: "<?php echo $open_time; ?>" });
    $( ".timepicker2" ).wickedpicker({ now: "<?php echo $close_time; ?>" });
  });
 </script>
		   <h3 class="noBackground">Additional Information</h3>
		     <div class="col-md-12">                          
            	<div class="fields">
                <label for="tiName">Service Timings</label>
                <input type="text" class="timepicker1"  name="open_time"   placeholder="Open time" style="width: 48%; float: left;">
				  <input type="text" class="timepicker2" name="close_time"  placeholder="Close time" style="width: 48%; margin-left: 29px;">
            	</div>                    
          	</div>
		     <div class="col-md-12">                          
            	<div class="fields">
                <label for="tiName" >No. of Students Trained</label>
					<input type="text" placeholder="No. of Students Trained" value="<?php echo $trained_students_count; ?>" id="trained_stud" name="trained_stud"  />
            	</div>                         
          	</div>
		    <?php endif; ?>
              <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
            <div class="col-md-12">
              <div class="fields submitFields">
               
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save" id="saveInsAddress" />
               <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>
            </form>
           </li>
           
<!--           <li class="tsUI profileList">
           
            <form action="" method="" id="UserIdentityInfo">
           
            <h3>Identity Information</h3>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <?php
			$user_ids = DB::table('tbluserinstidinfo')
					->where('nUsrID', Auth::user()->ausrid)
					->get();
			$required_fields = 3 - count($user_ids);

			for( $i = 0; $i < count($user_ids); $i++ ){
				
			?>
			  <div class="col-md-6">                          
            	<div class="fields">
                <label for="tsUI{{$user_ids[$i]->nIDMaster}}" class="hide">User Identity Information*</label>					
				<?php
					$identity = DB::table('tblidmaster')->where('aIDtype', '!=', 1)->get();
				?>
               <select name="id[]" id="tsUI" class="dropdown1 identityTypes">
                		<option value=""></option>
						@foreach($identity as $identity)
						  <option value="{{$identity->aIDtype}}" <?php if($identity->aIDtype == $user_ids[$i]->nIDMaster){ echo "selected"; } ?>>{{$identity->tIDName}}</option>
						  @endforeach
               		</select>
            	</div>                          
          	</div>
			   <div class="col-md-6">
             <div class="fields">
                <label for="tsInumber" class="hide">Identity Number*</label>
                <input type="text" placeholder="Identity Number" value="{{$user_ids[$i]->tIDValue}}" id="tsInumber" name="val[]"  />
            	</div>    
            </div>
			<?php	} 		?>
			<?php for( $j = 0; $j < $required_fields; $j++ ) { ?>
            <div class="col-md-6">                          
            	<div class="fields">
                <label for="tsUI" class="hide">User Identity Information*</label>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<?php
					$identity = DB::table('tblidmaster')->where('aIDtype', '!=', 1)->get();
				?>
               <select name="id[]" id="tsUI" class="dropdown1">
                		<option value=""></option>
						        @foreach($identity as $identity)
						        <option value="{{$identity->aIDtype}}">{{$identity->tIDName}}</option>
						          @endforeach
               		</select>
            	</div>                          
          	</div>
            
            <div class="col-md-6">
             <div class="fields">
                <label for="tsInumber" class="hide">Identity Number*</label>
                <input type="text" placeholder="Identity Number" value="" id="tsInumber" name="val[]"  />
            	</div>    
            </div>
            <?php } ?>
			
              <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
            <div class="col-md-12">
              <div class="fields submitFields">
               
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
               <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>
            
            </form>
           
           </li>-->
           
           <li class="tsAddInformation profileList">
           <form action="" method="" id="AdditionalInfo" >
           
            <h3>Profile Information</h3>
              <h3 class="noBackground">Role Type</h3>
			<div class="col-md-12">			
			<input type="text" name="tsStudent" class="form-control" value="<?php echo $role; ?>" disabled>
				</div>           
		   <h3 class="noBackground">Language</h3>
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <?php
			$lang_ids = DB::table('tbluserlang')
					->where('nuserid', Auth::user()->ausrid)
					->get();
			$required_fields = 3 - count($lang_ids);

			for( $i = 0; $i < count($lang_ids); $i++ ){
				
			?>
			
				<div class="col-md-12">
                	<div class="row">
			
                      <!--1-->
                <div class="col-md-3">
                   <div class="fields">
                <label for="tsUI" class="hide">Language*</label>
				<?php
					$lang = DB::table('tbllanguagemaster')->get();
				?>
               <select name="langid[]" id="tsUI" class="dropdown1">
                		<option value="">Select Language</tion>
						@foreach($lang as $lang)
						  <option value="{{$lang->aCourseLangOptionID}}" <?php if($lang->aCourseLangOptionID == $lang_ids[$i]->nlangid){ echo "selected"; } ?>>{{$lang->tCourseLangName}}</option>
						  @endforeach
               		</select>
            	</div>  
                </div>
                <!--1-->
                 <!--1-->
                <div class="col-md-3">
                    <div class="fields">	
                    	<label for="ttRead" class="readLabel">
                    	<input type="checkbox" value="1" id="ttRead" name="read[]" <?php if( $lang_ids[$i]->bread == 1){ echo "checked"; } ?>/> <span>Read</span>
                    	</label>
                    </div>
                </div>
                <!--1-->
                  <!--1-->
                <div class="col-md-3">
                    <div class="fields">	
                    	
                       <label for="ttWrite" class="readLabel">
                    	<input type="checkbox" value="1" id="ttWrite" name="write[]" <?php if( $lang_ids[$i]->bwrite == 1){ echo "checked"; } ?>/> <span>Write</span>
                    	</label>
                        
                    </div>
                </div>
                <!--1-->
                   <!--1-->
                <div class="col-md-3">
                    <div class="fields">	
                   
                        
                          <label for="ttSpeak" class="readLabel">
                    	<input type="checkbox" value="1" id="ttSpeak" name="speak[]" <?php if( $lang_ids[$i]->bspeak == 1){ echo "checked"; } ?>/> <span>Speak</span>
                    	</label>
                    </div>
                </div>
                <!--1-->
                    
                    </div>
                </div>
			 
			<?php	} 		?>
			<?php for( $j = 0; $j < $required_fields; $j++ ) { ?>
			
				<div class="col-md-12">
                	<div class="row">
			
                      <!--1-->
                <div class="col-md-3">
                   <div class="fields">
                <label for="tsUI" class="hide">Language*</label>
				<?php
					$lang = DB::table('tbllanguagemaster')->get();
				?>
               <select name="langid[]" id="tsUI" class="dropdown1">
                		<option value="">Select Language</option>
						@foreach($lang as $lang)
						  <option value="{{$lang->aCourseLangOptionID}}">{{$lang->tCourseLangName}}</option>
						  @endforeach
               		</select>
            	</div>  
                </div>
                <!--1-->
                 <!--1-->
                <div class="col-md-3">
                    <div class="fields">	
                    	<label for="ttRead" class="readLabel">
                    	<input type="checkbox" value="1" id="ttRead" name="read[<?php echo $j; ?>]" /> <span>Read</span>
                    	</label>
                    </div>
                </div>
                <!--1-->
                  <!--1-->
                <div class="col-md-3">
                    <div class="fields">	
                    	
                       <label for="ttWrite" class="readLabel">
                    	<input type="checkbox" value="1" id="ttWrite" name="write[<?php echo $j; ?>]" /> <span>Write</span>
                    	</label>
                        
                    </div>
                </div>
                <!--1-->
                   <!--1-->
                <div class="col-md-3">
                    <div class="fields">	
                   
                        
                          <label for="ttSpeak" class="readLabel">
                    	<input type="checkbox" value="1" id="ttSpeak" name="speak[<?php echo $j; ?>]" /> <span>Speak</span>
                    	</label>
                    </div>
                </div>
                <!--1-->
                    
                    </div>
                </div>
            
         
            <?php } ?>

				
                
                 <h3 class="noBackground">Skill Proficiency</h3>
                
            <div class="col-md-12">
                <div class="fields">
                    <p>Describe any 10 keywords that would describe your or Institute's Skill proficiency and Area of Study!</p>
                    <label for="summary"><i>Please separate every key word with a <strong class="green">;&nbsp;</strong></i></label>
					<?php
					$result = DB::table('tblusrinstskillprof')
					->where('nusrid', Auth::user()->ausrid)
					->get();
					$skillp	= array();				
					foreach($result as $value){
						$skillp[] = $value->tSkillDescription;
						
					}
					$summary = implode(';', $skillp);
					?>
                    <textarea name="skillproficiency" cols="5" rows="5" id="summary" maxlength="250"><?php echo $summary; ?></textarea>
                </div>
            </div>
               <h3 class="noBackground">Certifications</h3>
                
            <div class="col-md-12">
                <div class="fields">
                    <p>Describe your certification</p>
                    <label for="summary"><i>Please separate every key word with a <strong class="green">;&nbsp;</strong></i></label>
					<?php
					$result = DB::table('tbl_user_certification')
					->where('user_id', Auth::user()->ausrid)
					->get();
					$skillp	= array();				
					foreach($result as $value){
						$skillp[] = $value->certification_name;
						
					}
					$summary = implode(';', $skillp);
					?>
                    <textarea name="certifications" cols="5" rows="5" id="summary" maxlength="250"><?php echo $summary; ?></textarea>
                </div>
            </div>
            
             <h3 style="display:none" class="noBackground">Affiliation</h3>
             
            <div style="display:none"class="col-md-12 skillSection">
                <div class="row">
                   <div class="fields">  
                            <div class="col-md-8">
                                <p>Are you affiliated/Certified to any of the Sector Skill Councils?</p>
                            </div>
                            <div class="col-md-2">
                                <label for="skillYes"><span>Yes</span>
                                    <input type="radio" value="1" class="skillYN yes" name="skillYN" />
                                </label>
                            </div>
                            <div class="col-md-2">                                   
                                 <label for="skillNo"><span>No</span>
                                     <input type="radio" value="0" class="skillYN no" name="skillYN" />
                                </label>                     
                            </div>                    
                   </div>
                </div>
            </div>
            
            <div class="col-md-12"  >
                <div class="row" id="affiliatedsectors" style="display:none">
                
                	<div class="col-md-12">
                     <p>Please select the affiliated sectors from the list below!</p>
                    </div>
                                        
                   <?php
					$sectors = DB::table('tblsectormaster')->get();	
					?>
                    <div class="col-md-12">                 	
                       <div class="row">
							<?php $count = 0; ?>
							@foreach($sectors as $sector)
								  
								<?php if( ($count%4) == 0) {  ?>
								 <div class="col-md-3">
								<?php } ?>
							  <div class="fields">  
                                    <label for="">
                                        <input type="checkbox" value="{{$sector->aSectorID}}"  name="aff_sectors[]" 
										<?php 
										$aff_sectors = DB::table('tblsectoraffiliation')
										->where('nsectorid', $sector->aSectorID)
										->where('nuserid', Auth::user()->ausrid)
										->get();
										if( count($aff_sectors) > 0 ){
											echo "checked";
										}
										?>
										> <span>{{$sector->tSectorName}}</span>
                                    </label> 
                                 </div> 
								 <?php if( (($count + 1)%4) == 0) {  ?>
								 </div>
								<?php } ?>
								 <?php $count++; ?>
							@endforeach
                       </div>
                    </div>
                   
                   
                   
                  
                        
                           
                  
                    
    
                         
							
                    

                <div class="col-md-12">                 	
                    <div class="row">   
                    
                  
                                     <div class="col-md-3">       
                                
                                <div class="fields">  
                                    <label for="">
                                     <input type="checkbox" value="" id="" name="" /> <span>Management and Management Services</span>
                                    </label> 
                                </div> 
                            
                              </div>            
                                
                                   <div class="col-md-3">
                                <div class="fields">  
                                    <label for="">
                                        <input type="checkbox" value="" id="" name="" /> <span>Chemicals and Petrochemical</span>
                                    </label> 
                                 </div> 
                          
                          
                         </div>                    
                    
                  
								
								
                        		
                      
 					               


                                            
                          </div>        
                    </div>         
                   
                </div>
            </div>
            
			<div class="col-md-12 skillSection">
                <div class="row" style="display:none">
                   <div class="fields">  
                            <div class="col-md-8">
                                <p>Are you a NSDC affiliated Training Institute?</p>
                            </div>
                            <div class="col-md-2">
                                <label for="nsdcY"><span>Yes</span>
                                    <input type="radio" value="1" class="nsdcY yes" name="nsdcYN" <?php if(isset($user->nNSDC_affiliation) && $user->nNSDC_affiliation == 1) { echo "checked"; } ?>/>
                                </label>
                            </div>
                            <div class="col-md-2">                                   
                                 <label for="nsdcN"><span>No</span>
                                     <input type="radio" value="0" class="nsdcY no" name="nsdcYN" <?php if(isset($user->nNSDC_affiliation) && $user->nNSDC_affiliation == 0) { echo "checked"; } ?>/>
                                </label>                     
                            </div>                    
                   </div>
                </div>
            </div>  
            
            <div class="col-md-6" style="display:none" id="NSDCaffiliation">
                <div class="fields"> 
                    <label for="nsdcNo" class="hide">NSDC affiliation Registration No./Certification Number</label>
                    <input type="text" placeholder="NSDC affiliation Registration No./Certification Number" value="<?php if(Auth::user()->nUsrRoleID == 1002) { echo $user->tNSDC_affiliation_cert_no; } ?>" id="nsdcNo" name="nsdcNo"  />
                </div>
            </div>      
              <div class="col-md-12">
			<p id="LoadingImag"></p>
            <p class="ResponseMsg"></p>
        </div>  
             <div class="col-md-12">
              <div class="fields submitFields">
               
                <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                  <a class="goBackBtn" href="/account/profile">Cancel</a>
              </div>
            </div>     
           
           </form>
           
           </li>
           
           <li class="tsBilling profileList">
           
             <form action="" method="" >
           
            <h3>Billing</h3>
             <!---->
            	<div class="col-md-6">
                	<div class="fields">
                    
                   
                    <ul class="grid">
                    
                    <li class="mb20 card-wrapper">
            	<label class="mb10 hide" for="cardNumber">Cardholder Name</label>
            	<p class="cd">
            	
            		<input type="text" value="" placeholder="Cardholder Name" id="" name="" >
					
				</p>
                
                </li>
                    
        		<li class="mb20 card-wrapper">
            	<label class="mb10 hide" for="cardNumber">ENTER DEBIT CARD NUMBER</label>
            	<p class="cd">
            	
            		<input type="text" value="" placeholder="Enter Debit Card Number" data-type="ts" maxlength="23" id="cn1" name="" autocomplete="off" class="tsCardNumber  text-input large-input cardInput type-tel d" kl_virtual_keyboard_secure_input="on">
					<input type="hidden" class="required" value="" name="cardNumber">
				</p>
                
                </li>
			
            <li style="overflow:hidden; clear:both;" class="fl expiry-wrapper">
     	    	<label for="tsExpMonth" class="mb10 tsExpMonth tsExpYear">EXPIRY DATE</label>
               	<div class="mb10">
               		<div id="tsExpMonthWrapper" class="fl">
                	<select style="width: 80px;" name="ccExpiryMonth" id="tsExpMonth" class="tsExpMonth  combobox required dropdown">
                		<option value="0">MM</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
               		</select>
               		</div>
               		
               	 	<div id="tsExpYearWrapper" class="fl ml10">
               			<select style="width: 80px;" name="ccExpiryYear" id="tsExpYear" class="tsExpYear combobox required dropdown">
             				<option value="0">YY</option>
                           <option value="2016">2016</option>
							  
							<option value="2017">2017</option>
							  
							<option value="2018">2018</option>
							  
							<option value="2019">2019</option>
							  
							<option value="2020">2020</option>
							  
							<option value="2021">2021</option>
							  
							<option value="2022">2022</option>
							  
							<option value="2023">2023</option>
							  
							<option value="2024">2024</option>
							  
							<option value="2025">2025</option>
							  
							<option value="2026">2026</option>
							  
							<option value="2027">2027</option>
							  
							<option value="2028">2028</option>
							  
							<option value="2029">2029</option>
							  
							<option value="2030">2030</option>
							  
							<option value="2031">2031</option>
							  
							<option value="2032">2032</option>
							  
							<option value="2033">2033</option>
							  
							<option value="2034">2034</option>
							  
							<option value="2035">2035</option>
							  
							<option value="2036">2036</option>
							  
							<option value="2037">2037</option>
							  
							<option value="2038">2038</option>
							  
							<option value="2039">2039</option>
							  
							<option value="2040">2040</option>
							  
							<option value="2041">2041</option>
							  
							<option value="2042">2042</option>
							  
							<option value="2043">2043</option>
							  
							<option value="2044">2044</option>
							  
							<option value="2045">2045</option>
							  
							<option value="2046">2046</option>
							  
							<option value="2047">2047</option>
							  
							<option value="2048">2048</option>
							  
							<option value="2049">2049</option>
							  
							<option value="2050">2050</option>
							  
							<option value="2051">2051</option>
							  
							</select>
               	 </div>
               	 <div class="clear"></div>
               </div>
               
               
               
                </li>
                
            
            <li id="tsCvvWrapper" class="ml10 fl relative">
               
                <div class="cvv-block">
                	<label class="mb10" for="cvvNumber">CVV</label>
                	<input type="text" autocomplete="off" class="f-hide" name="">
                	<input type="password" placeholder="CVV" maxlength="4" id="tsCvvBox" name="cvvNumber" autocomplete="off" class="tsCvvBox  text-input small-input width40 required type-tel" kl_virtual_keyboard_secure_input="on">
                	<div class="clear"></div>
                	</div>
                
                <div class="cvv-clue-box hide">
	                <div class="ts-cvv-clue ui-cluetip mt10">
	                	The last 3 digit printed on the signature panel on the back of your debit card.
	                </div>
	            </div>
            </li>
		</ul>
        
        
                   
                    
                    </div>
                </div>
                 <!---->
                 
                <div class="col-md-12">
                    <div class="fields submitFields">
                        <input type="submit" class="blueBtn" name="save" alt="Save" value="Save"/>
                          <a class="goBackBtn" href="/account/profile">Cancel</a>
                    </div>
                </div>
                 
                  </form> 
                
                </li>
            
           

                
                
            </ul>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="page-loader"></div>


  <script>

       // Image Uplaod
    function uploadImage() { 
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.loadingimage').html('<img src="/resources/assets/images/ajax-loader.gif">');
        var token = $('#token').val();
        var image_type = $('#image_type').val();
        var file_data = $('#image_file').prop('files')[0];	
        var form_data = new FormData();        
        $('.invalid-msg').empty();
        form_data.append('_token', token);
        form_data.append('image_type', image_type);
        form_data.append('file', file_data);
            $.ajax({
                url: "/upload-image",		
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,               
                type: 'post',
                dataType: "json",
                success: function(data){
//                    console.log(data.status);
//                    $('.loadingimage').html('');
//                    $('.profile-img').html(data.img);
//                    $('.image_filename').val(data.filename);
//                    $('.loadingimage').html('');
                    console.log(data);
                    if(data.status === 'success'){
                        $('.profile-img').html(data.img);
                        $('.image_filename').val(data.filename);
                    } else if (data.status === 'failed') {
                        //window.location.href = data.redirect_url;
                        $('.invalid-msg').html('<div class="alert alert-danger" role="alert"> <strong>Error! </strong>'+data.msg+'</div>');
                    }
                }
            });
        return false;
    }  function uploadImage1() {

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $('.loadingimage').html('<img src="/assets/images/ajax-loader.gif">');
     var token = $('#token').val();
     var file_data = $('#image_file').prop('files');
     var form_data = new FormData();
     var image_type = $('#image_type').val();
     form_data.append('image_type',image_type);
     form_data.append('file', file_data);
     $('.invalid-msg').empty();
     $.ajax({
         url: "/upload-image",
         cache: false,
         contentType: false,
         processData: false,
         data: form_data,
         type: 'post',
         dataType: "json",
         success: function(data) {
            $('.loadingimage').html('');
            if(data.status === 'success'){
                $('.profileBox').html(data.img);
                $('.image_filename').val(data.filename);
            } else if (data.status === 'failed') {
                //window.location.href = data.redirect_url;
                $('.invalid-msg').html('<div class="alert alert-danger" role="alert"> <strong>Error! </strong>'+data.msg+'</div>');
            }
         }
     });
     return false;
 }
    function initAutocomplete() {
      
      var userAddress = document.getElementById('tGoogleLoc');
      var option =  {
                      types : [ '(regions)' ],
                      componentRestrictions : {country : "IN"}
                    };

      new google.maps.places.Autocomplete(userAddress,option);


      var instituteAddress = document.getElementById('tGoogleInsLoc');
      new google.maps.places.Autocomplete(instituteAddress,option);  
      
    }
    
 
      
             
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo env('GOOGLE_PLACE_SEARCH_KEY'); ?>&libraries=places&callback=initAutocomplete" async defer></script>
<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use App\Income;
use Auth;
use DB;
use App\Staff;

class OverviewController extends Controller
{
    public function index(Request $request) {
        
        $userid = Auth::user()->id;

        $get_totalincomeData = Income::where('salon_id',$userid)
        ->sum('amount'); 

        $get_totalexpensesData = Expense::where('salon_id',$userid)
        ->sum('amount');

        $get_totalEarning = $get_totalincomeData - $get_totalexpensesData;
        

        $result = DB::table('appointments')
                    ->Where('salon_id',$userid)
                    ->paginate(5);

       // die($result);
        return view('user-view/overview-view',['get_totalEarning'=>$get_totalEarning,'result'=>$result]);
     
    }

    public function income(Request $request) {
        
          $income_userid = Auth::user()->id;
        $get_incomeamountData = income::where('salon_id',$income_userid)
                ->where('income_type','rent')
              ->sum('amount');
        
        $get_incomeproductsData = income::where('salon_id',$income_userid)
                ->where('income_type','products')
              ->sum('amount');
               
        $get_incomeothersData = income::where('salon_id',$income_userid)
                ->where('income_type','others')
              ->sum('amount');      
        
        $get_incomeappointmentsData = income::where('salon_id',$income_userid)
                ->where('income_type','appointments')
              ->sum('amount');  

        $get_incomedonationsData = income::where('salon_id',$income_userid)
                ->where('income_type','donations')
              ->sum('amount'); 

        $get_incomemarketingData = income::where('salon_id',$income_userid)
                ->where('income_type','marketing')
              ->sum('amount'); 
               
               
        $get_incometotalsData = income::where('salon_id',$income_userid)
              ->sum('amount'); 
       
        return view('user-view/overview-income',['get_incomeappointmentsData'=>$get_incomeappointmentsData,'get_incomeproductsData'=>$get_incomeproductsData,'get_incomeothersData'=>$get_incomeothersData,'get_incomedonationsData'=>$get_incomedonationsData,'get_incomemarketingData'=>$get_incomemarketingData,'get_incometotalsData'=>$get_incometotalsData]);
    }  
          
     public function overview_add_income(Request $request) {
         
         
		$income_userid = Auth::user()->id;
		        
        $income_calender = $request->input('income_calender');
        $income_Position = $request->input('income_Position');
        $income_amount = $request->input('income_amount');
      
        
        
        $add_income = new Income;
        $add_income->income_date = $income_calender;
        $add_income->income_type = $income_Position;
        $add_income->amount = $income_amount;
        $add_income->salon_id = $income_userid;
        $add_income->save();
    
         return 1;
    }
    
    
      public function overview_filerdata_income(Request $request){
        
        $income_Start_calenderDate  = $request->input('income_Start_calenderDate');
        $income_End_calenderDate = $request->input('income_End_calenderDate');
        
        
        $filter_appointmentsData = DB::table('incomes')
         ->whereBetween('income_date', array($income_Start_calenderDate, $income_End_calenderDate))
        ->where('income_type','appointments')
        ->sum('amount');
       
        
        // $filter_rentData = DB::table('expenses')
        //  ->whereBetween('income_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        // ->where('expense_type','rent')
        // ->sum('amount');  
        
        $filter_productsData = DB::table('incomes')
         ->whereBetween('income_date', array($income_Start_calenderDate, $income_End_calenderDate))
        ->where('income_type','products')
        ->sum('amount'); 
        
           $filter_othersData = DB::table('incomes')
         ->whereBetween('income_date', array($income_Start_calenderDate, $income_End_calenderDate))
        ->where('income_type','others')
        ->sum('amount'); 

          $filter_donationsData = DB::table('incomes')
         ->whereBetween('income_date', array($income_Start_calenderDate, $income_End_calenderDate))
        ->where('income_type','donations')
        ->sum('amount'); 

         $filter_marketingData = DB::table('incomes')
         ->whereBetween('income_date', array($income_Start_calenderDate, $income_End_calenderDate))
        ->where('income_type','marketing')
        ->sum('amount'); 
        
        
        $total_filter_incomeCalcualte =  $filter_appointmentsData+$filter_productsData+$filter_othersData+$filter_donationsData+$filter_marketingData;
         
         
         echo json_encode([
                
                'appointments' =>$filter_appointmentsData,
                // 'rent' =>$filter_rentData,
                'products' =>$filter_productsData,
                'others' =>$filter_othersData,
                'donations' =>$filter_donationsData,
                'marketing' =>$filter_marketingData,
                'total_expenses' =>$total_filter_incomeCalcualte
             
        ]);
        
        
        
        
        
      
    }
    
    
    
     public function expenses(Request $request) {
        
        $expenses_userid = Auth::user()->id;
        $get_expensesamountData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','rent')
               ->sum('amount');
        
        $get_expensesproductsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','products')
               ->sum('amount');
               
        $get_expensesothersData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','others')
               ->sum('amount');      
        
        $get_expensesappointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','appointments')
               ->sum('amount');  



         $get_inventoryappointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','inventory')
               ->sum('amount');

           $get_standard_monthly_payments_appointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','standard_monthly_payments')
               ->sum('amount');  

            $get_marketing_costs_appointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','marketing_costs')
               ->sum('amount');  

            $get_Food_drinks_appointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','Food_drinks')
               ->sum('amount'); 

            $get_subscription_costs_appointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','subscription_costs')
               ->sum('amount');    

            $get_educational_expenses_appointmentsData = Expense::where('salon_id',$expenses_userid)
                ->where('expense_type','educational_expenses')
               ->sum('amount'); 

            $get_expensestotalsData = Expense::where('salon_id',$expenses_userid)
               ->sum('amount'); 

         
        return view('user-view/overview-expenses',['get_expensesamountData'=>$get_expensesamountData,'get_expensesproductsData'=>$get_expensesproductsData,'get_expensesothersData'=>$get_expensesothersData,'get_expensesappointmentsData'=>$get_expensesappointmentsData,'get_inventoryappointmentsData'=>$get_inventoryappointmentsData,'get_standard_monthly_payments_appointmentsData'=>$get_standard_monthly_payments_appointmentsData,'get_marketing_costs_appointmentsData'=>$get_marketing_costs_appointmentsData,'get_Food_drinks_appointmentsData'=>$get_Food_drinks_appointmentsData,'get_subscription_costs_appointmentsData'=>$get_subscription_costs_appointmentsData,'get_educational_expenses_appointmentsData'=>$get_educational_expenses_appointmentsData,'get_expensestotalsData'=>$get_expensestotalsData]);
    }
      public function balance(Request $request){
        
        $AuthUserID = Auth::user()->id;
        
        $get_totalincomeData = Income::where('salon_id',$AuthUserID)
              ->sum('amount'); 
              
        $get_totalexpensesData = Expense::where('salon_id',$AuthUserID)
              ->sum('amount');
              
              
         $getTotal_balance = $get_totalincomeData - $get_totalexpensesData;
              
              
        return view('user-view/overview-balance',['get_totalincomeData'=>$get_totalincomeData,'get_totalexpensesData'=>$get_totalexpensesData,'getTotal_balance'=>$getTotal_balance]);
    }
    
    public function range(Request $request){
        return view('date_range');
    }
    
    public function overview_add_expenses(Request $request) {
         
		$expenses_userid = Auth::user()->id;
		        
        $expenses_calender = $request->input('expenses_calender');
        $expenses_Position = $request->input('expenses_Position');
        $expenses_amount = $request->input('expenses_amount');
        
        
        $Add_expenses = new Expense;
        $Add_expenses->expenses_date = $expenses_calender;
        $Add_expenses->expense_type = $expenses_Position;
        $Add_expenses->amount = $expenses_amount;
        $Add_expenses->salon_id = $expenses_userid;
        $Add_expenses->save();
    
         return 1;
    }
    
    public function overview_filerdata_expenses(Request $request){
        
        $expenses_Start_calenderDate  = $request->input('expenses_Start_calenderDate');
        $expenses_End_calenderDate = $request->input('expenses_End_calenderDate');
        
        
         $filter_appointmentsData = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','appointments')
        ->sum('amount');
        
        $filter_rentData = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','rent')
        ->sum('amount');  
        
        $filter_productsData = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','products')
        ->sum('amount'); 
        
           $filter_othersData = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','others')
        ->sum('amount');


         $filter_inventoryData = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','inventory')
        ->sum('amount');  

        $filter_standard_monthly_paymentsData = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','standard_monthly_payments')
        ->sum('amount');

          $filter_marketing_costs_Data = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','marketing_costs')
        ->sum('amount'); 

         $filter_Food_drinks_Data = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','Food_drinks')
        ->sum('amount');  

        $filter_subscription_costs_Data = DB::table('expenses')
         ->whereBetween('expenses_date', array($expenses_Start_calenderDate, $expenses_End_calenderDate))
        ->where('expense_type','subscription_costs')
        ->sum('amount');


        
        
        $total_filter_expensesCalcualte =  $filter_appointmentsData+$filter_rentData+$filter_productsData+$filter_othersData+$filter_inventoryData+$filter_standard_monthly_paymentsData+$filter_marketing_costs_Data+$filter_Food_drinks_Data+$filter_subscription_costs_Data;
         
         
         echo json_encode([
                
                'appointments' =>$filter_appointmentsData,
                'rent' =>$filter_rentData,
                'products' =>$filter_productsData,
                'others' =>$filter_othersData,
                'inventory' =>$filter_inventoryData,
                'standard_monthly_payments' =>$filter_standard_monthly_paymentsData,
                'marketing_costs' =>$filter_marketing_costs_Data,
                'Food_drinks' =>$filter_Food_drinks_Data,
                'subscription_costs' =>$filter_subscription_costs_Data,

                'total_expenses' =>$total_filter_expensesCalcualte
             
        ]);
      
    }
    
     public function overview_customerfilerdata(Request $request){
        
         $AuthUserID = Auth::user()->id;

        $overview_startcustomerCalender  = $request->input('overview_startcustomerCalender');
        $overview_endcustomerCalender = $request->input('overview_endcustomerCalender');
    
        $get_totalincomeData = Income::where('salon_id',$AuthUserID)
              ->whereBetween('income_date', array($overview_startcustomerCalender, $overview_endcustomerCalender))
              ->sum('amount'); 

              
        $get_totalexpensesData = Expense::where('salon_id',$AuthUserID)
              ->whereBetween('expenses_date', array($overview_startcustomerCalender, $overview_endcustomerCalender))
              ->sum('amount');
              
              
         echo $getTotal_balance = $get_totalincomeData - $get_totalexpensesData;
        
       
      
    }


       public function filter_overview_Appointmentdata(Request $request) {
         
         
        $AuthUserID = Auth::user()->id;

        $overview_startcustomerCalender  = $request->input('overview_startcustomerCalender');
        $overview_endcustomerCalender = $request->input('overview_endcustomerCalender');

        $getCustomerData = DB::table('customer_overview_details')
        ->where('user_type',3)
        ->paginate(5);

        $get_totalEarning = Income::where('salon_id',$AuthUserID)
        ->sum('amount'); 

        $getStaffMember = Staff::where('salon_id',$AuthUserID)
        ->get();

         return view('user-view/overview-view-filter_search',['getCustomerData'=>$getCustomerData,'get_totalEarning'=>$get_totalEarning,'getStaffMember'=>$getStaffMember,'overview_startcustomerCalender'=>$overview_startcustomerCalender,'overview_endcustomerCalender'=>$overview_endcustomerCalender]);
          
    }
    
}

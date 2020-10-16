<div class="container-fluid"  style="background-color: #631578; height: 45px;">
		
		    
			<?php
			   if(isset($_SESSION['u_id']))
			   {
				   echo '<form action="logout.php" method="POST">
		                   <button type="submit" name="submit" style="
						                                      float: right; 
															  margin-top:11px;
                                                              margin-right: 5px;															  
															  border-radius: 3px;
															  background-color: white;
															  border: none; ">Logout</button>
		                 </form>';
				   
			   }
			   else{
				   
				   echo '<form style="float: right; padding-top: 9px;" action="login.inc.php" method="POST">
				  <input type="text" name="uid" placeholder="username or email" >
				  
				  <input type="password" name="pwd" placeholder="password">
				  <button type="submit" name="loginSubmit" style="
                                                      background-color: #4CAF50; 
                                                      border: none;
                                                      color: white;
                                                      text-align: center;
                                                      text-decoration: none;
                                                      display: inline-block;
                                                      font-size: 16px;">Login</button>
													  
													  
													  
				 <button type="submit" name="submit"     style="
				                                      float: right;
                                                      background-color: white;
                                       													  
                                                      border: none;
	                                                  margin: 0px 5px;
                                                      color: white;
                                                      text-align: center;
                                                      text-decoration: none;
                                                      display: inline-block;
                                                      font-size: 16px;">
													  <a href="signup.php" " >Sign up</a></button>
				  
				</form>';
			   }
			?>
			
        
	
	    
				
				
				
					  
		       
				 	  
		  </div>
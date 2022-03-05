<?php

	function post_status_change( $new_status, $old_status, $post ) {

		// get the array of theme options - for getting product logo
		global $infogroup_options;

		// Get the current user's info
		$current_user = wp_get_current_user();

		// get site title
		$site_title = get_bloginfo('name');
    
    	// if the new post status isn't the same as the the old send an email
    	if ($new_status != $old_status) {

        	$to = 'andy.warren@infogroup.com, travis.hickox@infogroup.com';
			$subject = $site_title . ' Post Status Change';
			
			$message = '

				<html lang="en">
					<head>
					    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
					    <meta content="width=device-width, initial-scale=1" name="viewport">
					    <meta content="IE=edge" http-equiv="X-UA-Compatible">
					    <meta name="”x-apple-disable-message-reformatting”">
					
					    <title>Responsive Email Templates</title>
					    <style type="text/css">
					               
					               /* CLIENT-SPECIFIC STYLES */
					               body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
					               table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
					               img { -ms-interpolation-mode: bicubic; }
					               
					               /* RESET STYLES */
					               img { border: 0; line-height: 100%; outline: none; text-decoration: none; }
					               table { border-collapse: collapse !important; }
					               body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
					               
					               /* iOS BLUE LINKS */
					               a[x-apple-data-detectors] {
					                   color: inherit !important; 
					                   text-decoration: none !important;
					                   font-size: inherit !important;
					                   font-family: inherit !important;
					                   font-weight: inherit !important;
					                   line-height: inherit !important;
					               }
					               
					               /* General Styles */
					               
					               /* MEDIA QUERIES */
					               @media only screen and (max-width: 639px){
					                   .wrapper{ width:320px!important; padding: 0 !important; }
					                   .container{ width:300px!important;  padding: 0 !important; }
					                   .mobile{ width:300px!important; display:block!important; padding: 0 !important; }
					                   .mobile50{ width:150px!important; padding: 0 !important; }
					                   .center{ margin:0 auto !important; text-align:center !important; }
					                   .imgClass{ width:100% !important; height:auto; }
					                   .header{ width:320px; padding: 0 !important; background-image: url(http://placehold.it/320x400) !important; }
					                   *[class="mobileOff"] { width: 0px !important; display: none !important; }
					                   *[class*="mobileOn"] { display: block !important; max-height:none !important; }
					               }
					               
					    </style>
					</head>
					
					<body style="margin:0; padding:0; background-color:#ffffff;">
					    <!--[if !mso]><!== -->
					    <img alt="" class="mobileOff" height="1" src="http://dbynllw4cshgu.cloudfront.net/Email/misc/spacer.gif" style="min-width:640px; display:block; margin:0; padding:0" width="640"> 					<!--<![endif]-->
					
					
					    <center>
					        <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%">
					            <tr>
					                <td align="center" valign="top">
					                    <!-- Start Wrapper  -->
					
					
					                    <table bgcolor="#EBEBEB" border="0" cellpadding="0" cellspacing="0" id="customHeaderViewInBrowser" width="100%">
					                        <tr>
					                            <td height="10" style="font-size:10px; line-height:10px;">
					                            </td><!-- Spacer -->
					                        </tr>
					
					
					                        <tr>
					                            <td align="center">
					                                <table border="0" cellpadding="0" cellspacing="0" class="container" width="600">
					                                    <tr>
					                                        <td class="mobile center" style="font-family:arial; font-size:10px; line-height:18px;" width="300">' . date('M jS, Y') . '</td>
					
					                                        <td class="mobile center" style="text-align:right; font-family:arial; font-size:10px; line-height:18px;" width="300"><a href="' . get_permalink(					$post->ID) . '" style="color: #333333; font-weight: bold; text-decoration: none;">View/Edit Post</a>
					                                        </td>
					                                    </tr>
					                                </table>
					                            </td>
					                        </tr>
					
					
					                        <tr>
					                            <td height="10" style="font-size:10px; line-height:10px;">
					                            </td><!-- Spacer -->
					                        </tr>
					
					
					                        <tr>
					                            <td height="5" style="background:#419C1B; font-size: 5px; line-height: 5px;">
					                            </td>
					                        </tr>
					                    </table>
					                    <!-- end #customHeaderViewInBrowser -->
					
					
					                    <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" id="logoBar" width="100%">
					                        <tr>
					                            <td height="40" style="font-size:15px; line-height:15px;">
					                            </td><!-- Spacer -->
					                        </tr>
					
					
					                        <tr>
					                            <td align="center">
					                                <table border="0" cellpadding="0" cellspacing="0" class="container" width="600">
					                                    <tr>
					                                        <td class="" width="600"><img alt="Infogroup Product Logo" border="0" class="center" height="" src="' . $infogroup_options['header-logo']['url']					 . '" style="margin:0; padding:0; border:none; display:block;" width="">
					                                        </td>
					                                    </tr>
					                                </table>
					                            </td>
					                        </tr>
					
					
					                        <tr>
					                            <td height="40" style="font-size:15px; line-height:15px;">
					                            </td><!-- Spacer -->
					                        </tr>
					                    </table>
					                    <!-- Responsive Snippets Go Here -->
					
					
					                    <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" class="wrapper" id="fifty-fifty-color-with-button" width="640">
					                        <tbody>
					                            <tr>
					                                <td align="center">
					                                    <!-- Start Container -->
					
					
					                                    <table border="0" cellpadding="0" cellspacing="0" class="container" width="600">
					                                        <tbody>
					                                            <tr>
					                                                <td align="" class="mobile" style="font-size:12px; line-height:18px;" width="600">
					                                                    <!-- Start Content -->
					
					
					                                                    <table align="" border="0" cellpadding="0" cellspacing="0" class="container" width="600">
					                                                        <tbody>
					
					                                                            <tr>
					                                                                <td class="mobile" style="font-family:arial, sans-serif; font-size:16px; line-height:22px; color: #7f7f7f; text-align: 					left;">A post on ' . $site_title . ' has had its status changed.</td>
					                                                            </tr>
					                                                            
					                                                            <tr>
					                                                                <td height="15" style="font-size:10px; line-height:10px;">
					                                                                </td><!-- Spacer -->
					                                                            </tr>
					
					
					                                                            <tr>
					                                                                <td class="mobile" style="font-family:arial, sans-serif; font-size:16px; line-height:22px; color: #7f7f7f; text-align: 					left;"><strong>Post Title:</strong> ' . $post->post_title . '</td>
					                                                            </tr>
					
					
					                                                            <tr>
					                                                                <td height="20" style="font-size:10px; line-height:10px;">
					                                                                </td><!-- Spacer -->
					                                                            </tr>                                                            
					
					                                                            <tr>
					                                                                <td class="mobile" style="font-family:arial, sans-serif; font-size:16px; line-height:22px; color: #7f7f7f; text-align: 					left;"><strong>New Post Status:</strong> ' . $new_status . '</td>
					                                                            </tr>
					                                                            
					                                                            <tr>
					                                                                <td height="20" style="font-size:10px; line-height:10px;">
					                                                                </td><!-- Spacer -->
					                                                            </tr>

					                                                            <tr>
                                                                					<td class="mobile" style="font-family:arial, sans-serif; font-size:16px; line-height:22px; color: #7f7f7f; text-align: left;"><strong>User Who Made The Change: </strong>' . $current_user->user_firstname . ' ' . $current_user->user_lastname . ' (' . $current_user->user_login . ')</td>
                                                            					</tr>
                                                            
                                                            					<tr>
                                                            					    <td height="20" style="font-size:10px; line-height:10px;">
                                                            					    </td><!-- Spacer -->
                                                            					</tr>
					
					                                                            <tr>
					                                                                <td class="mobile" style="font-size:14px; line-height:20px;">
					                                                                    <!-- Start Button -->
					
					
					                                                                    <table border="0" cellpadding="0" cellspacing="0" class="centerClass" width="200">
					                                                                        <tbody>
					                                                                            <tr>
					                                                                                <td align="center" bgcolor="#8DC63F" height="36" style="font-family: Arial,Helvetica,sans-serif; 					font-size: 16px; color: #ffffff; line-height:18px;" valign="middle" width="200"><a href="' . 					get_permalink($post->ID) . '" style="text-decoration: none; color: #ffffff;" target="_blank">View/Edit This Post</a>
					                                                                                </td>
					                                                                            </tr>
					                                                                        </tbody>
					                                                                    </table>
					                                                                    <!-- End Button -->
					                                                                </td>
					                                                            </tr>
					
					
					                                                            <tr>
					                                                                <td height="20" style="font-size:10px; line-height:10px;">
					                                                                </td><!-- Spacer -->
					                                                            </tr>
					                                                        </tbody>
					                                                    </table>
					                                                    <!-- End Content -->
					                                                </td>
					                                            </tr>
					                                        </tbody>
					                                    </table>
					                                </td>
					                            </tr>
					                        </tbody>
					                    </table>
					                    <!-- end #fifty-fifty-color-with-button -->
					
					                    <table bgcolor="#EBEBEB" border="0" cellpadding="0" cellspacing="0" id="footer" width="100%">
					                        <tbody>
					                            <tr>
					                                <td bgcolor="#5C5C5C" height="30" style="font-size:10px; line-height:10px;">
					                                </td><!-- Spacer -->
					                            </tr>
					
					
					                            <tr>
					                                <td align="center">
					                                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="container center" width="600">
					                                        <tbody>
					                                            <tr>
					                                                <td height="20" style="font-size:20px; line-height:20px;">
					                                                </td><!-- Spacer -->
					                                            </tr>
					
					
					                                            <tr>
					                                                <td align="left" class="mobile center" style="font-size:12px; line-height:18px; color: #7F7F7F; font-family:arial, sans-serif;" 					width="300">&copy; Infogroup<sup>&reg;</sup> All Rights Reserved.<br>
					                                                1020 E. 1st Street, Papillion, NE 68046<br></td>
					
					                                                <td align="right" class="mobile center" width="300">
					                                                </td>
					                                            </tr>
					
					                                        </tbody>
					                                    </table>
					                                </td>
					                            </tr>
					                        </tbody>
					                    </table>
					                </td>
					            </tr>
					        </table>
					    </center>
					</body>
				</html>

			';
			
			// Always set content-type when sending HTML email
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
			
			// More headers
			$headers .= 'From: ' . $site_title . ' CMS <noreply-smbcms@infogroup.com>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . '\r\n';
			
			wp_mail($to, $subject, $message, $headers);

    	}

	}

	add_action('transition_post_status', 'post_status_change', 10, 3);

?>
 <?php
       if (isset($_POST['submit']))
        {
            $User_name = $_POST['name'];
            $phone = $_POST['phone'];
            $User_email = $_POST['email'];
            $User_state = $_POST['state'];
            $User_country = $_POST['country'];
            $User_alias = $_POST['alias'];
            $User_github = $_POST['g_url'];
            $User_twitter = $_POST['t_url'];
            $User_facebook = $_POST['f_url'];
            $User_hear = $_POST['hear'];
            $User_bio = $_POST['bio'];
            $ethereum_website = 'https://ethereum.network';
            $ethereum = 'ethereum.network';
            
            $email_send = 'clement@crevatal.com';
            $email_from = 'no_reply@cryptojunk.info';
            $email_subject_registrar = "Thank $User_name you for registering with $ethereum!";
            $email_body_registrar = "We are happy to have you on board.\n".
                                    "Kindly note that you will be notified on your entrance to the pool.\n".
                                    "Thank You!";
            
            $email_subject = "Ethereum network just got a new registration from $User_name!";
            $email_body =   "Find the details of $User_name below. \n\n".
                            "Name: $User_name.\n".
                            "Phone No: $phone.\n".
                            "Email Address: $User_email\n".
                            "Candidate's State: $User_state\n".
                            "Candidate's Country: $User_country\n".
                            "Candidate's Alias: $User_alias\n".
                            "Candidate's GitHub Link: $User_github\n".
                            "Candidate's Twitter Link: $User_twitter\n".
                            "Candidate's Facebook Link: $User_facebook\n\n".
                            "Candidate's Bio: \n\n".
                            "$User_bio";
            
            $to_email = "clemzyport@gmail.com, ebunayo08@gmail.com, hugboclement@yahoo.com";
            $headers = "From: $email_from \r\n";
            $headers .= "Reply-To: \r\n";
            
            $to_registrar_email = "$User_email";
            $headers = "From: $email_from \r\n";
            $headers .= "Reply-To: \r\n";            
            
            $secretKey = "6Lel7roUAAAAAMSJKUa46f0yaowxUmYe4xetLayI";
            $responseKey = $_POST['g-recaptcha-response'];
            $UserIP = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";
            
            $response = file_get_contents($url);
            $response = json_decode($response);
            
            if ($response->success){
                mail($to_email,$email_subject,$email_body,$headers);
                mail($to_registrar_email,$email_subject_registrar,$email_body_registrar,$headers);
                echo "Hi $User_name, your registration was successful!";
            } else {
                echo "<span>Hi $User_name, your captcha was invalid, please kindly try again.</span>";
            }
        }
?>
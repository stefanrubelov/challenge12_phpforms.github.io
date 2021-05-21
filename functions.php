<?php

//// SIGNUP FUNCTIONS-----------
//if all fields are correctly filled it sends the users credidentials to text file
function sendCredidentals()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            isset($_POST['username'])
            && preg_match("/^[a-zA-Z-' ]*$/", $_POST['username'])
            && isset($_POST['password'])
            && preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $_POST['password'])
            && isset($_POST['email'])
            && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $allusers = file_get_contents("users.txt");
            $allusers = trim($allusers);
            $allusers = (explode("\r\n", $allusers));
            $flagEmail = true;
            $flagUsername = true;

            foreach ($allusers as $key => $value) {
                $allusers[$key] = multipleExplode(array(", ", "=="), $value);
            }

            foreach ($allusers as $key => $value) {
                if ($allusers[$key][0] == $email) {
                    $flagEmail = false;
                    $flagPassword = $allusers[$key][2];
                    $flagUsername = $allusers[$key][0];
                    break;
                }
            }
            if ($flagEmail == false) {
                return "<span class='warning'>You are already registered with the account <b>$flagUsername</b> and your password is <b>$flagPassword</b><br><button class='btn btn-gray mb-2'><a href='login.php'> Login Here</a></button></span>";
            }

            foreach ($allusers as $key => $value) {
                if ($allusers[$key][1] == $username) {
                    $flagUsername = false;
                }
            }
            if ($flagUsername == false) {
                return '<span class="required">Username taken!</span>';
            } else {
                file_put_contents('users.txt', "$email, $username==$password\n", FILE_APPEND);
            }
        }
    }
}


//checks if username contains only letters and returns appropriate message
function validateUsername()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username'])) {
            return "<span class='required'>Username is required!</span>";
        } elseif (!preg_match("/^[a-zA-Z0-9']*$/", $_POST['username'])) {
            return "<span class='required'>Only letters are allowed in the username!</span>";
        }
    }
}

//checks if password contains required characters(letters, numbers, special characters) and returns appropriate message
function validatePassword()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['password'])) {
            return "<span class='required'>Password is required!</span>";
        } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $_POST['password'])) {
            return "<span class='required'>Password must contain at least one uppercase letter, lowecase letter, one number and one special character(!@#$%)</span>";
        }
    }
}
//checks if email is in valid format and returns appropriate message
function validateEmail()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['email'])) {
            return "<span class='required'>Email is required!</span>";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return "<span class='required'>Please enter a valid email!</span>";
        } elseif (strpos($_POST['email'], '@') < 5) {
            return "<span class='required'>Invalid email, must be at least 5 characters before @!</span>";
        }
    }
}


//keep username if password is not accepted
// function old($inputname) {
//     if(isset($_POST[$inputname])) {
//         return $_POST[$inputname];
//     }
// }


// LOGIN FUNCTIONS
//checks if login/password combination matches from users.txt
function matchLoginUsername()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['usernamelogin'];
        $arr = file_get_contents("users.txt");
        $arr = trim($arr);
        $arr = (explode("\n", $arr));
        $flag = false;

        foreach ($arr as $user) {
            // echo count($arr);
            for ($i = 0; $i < count($arr); $i++) {
                $arr2 = multipleExplode(array(", ", "=="), $arr[$i]);
                if ($_POST['usernamelogin'] === $arr2[1] && $_POST['passwordlogin'] === $arr2[2]) {
                    header("Location: welcome.php?usernamelogin=$username");
                    break;
                }
                //  else{
                //     echo '<span class="required">Wrong username/password combination</span>';
                //     break;
                // }
            }
            break;
        }
    }
}

// multiple delimiters for explode
function multipleExplode($delimiters, $string)
{
    $phase = str_replace($delimiters, $delimiters[0], $string);
    $processed = explode($delimiters[0], $phase);
    return  $processed;
}

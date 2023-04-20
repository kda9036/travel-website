<?php
    $page = "Visitor Survey";
    $path = "./";
    $heroimg = 'src="assets/images/sunset_island2_resized.jpg" alt="Island with sunset background"';
    $herotxt = '<h1>Visitor Survey</h1>';
    include($path."assets/inc/header.php");
    include($path."assets/inc/nav.php");
    include($path."assets/inc/hero.php");

    // for error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // function for sanitization
    function sanitize($str, $length=30) {
        $str = trim($str);
        $str = htmlentities($str, ENT_QUOTES);
        return substr($str, 0, $length);
    }

    // function for checking email
    function emailCheck($value) {
        $reg = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
        return preg_match($reg,$value);
    }

    // if fname and textarea/comment are filled out, add entry to database "comments"
    if(!empty($_GET['fname']) && !empty($_GET['comment'])) {
        $fname = sanitize($_GET['fname']);
        $lname = (isset($_GET['lname'])) ? sanitize($_GET['lname']) : NULL ;
        $phone = (isset($_GET['phone'])) ? $_GET['phone'] : NULL ;
        $email = (isset($_GET['email'])) ? $_GET['email'] : NULL ;
        $contact = (isset($_GET['contact'])) ? $_GET['contact'] : NULL ;
        $groupNum = (isset($_GET['groupNum'])) ? $_GET['groupNum'] : NULL ;
        $date = (isset($_GET['date'])) ? $_GET['date'] : NULL ;
        $place = (isset($_GET['place'])) ? $_GET['place'] : NULL ;
        $rating = (isset($_GET['rating'])) ? $_GET['rating'] : NULL ;
        $comment = sanitize($_GET['comment'], 1000);

        // if email is filled out
        if($email != NULL) {
            // remove all illegal characters from email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            // validate email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                // if invalid email, display message to user and provide link to revisit the feedback/comments page
                echo "<p style='text-align: center';>An invalid email address was entered</p>";
                echo "<br/><p style='text-align: center';><a href='comments.php'>Return to Feedback Page</a></p>";
                return;
            }
        }

        // connect to the database
        include("../../../dbCon.php");

        $stmt = $mysqli->prepare("INSERT INTO `finalComments` (`fname`, `lname`, `phone`, `email`, `contact`, `groupNum`, `date`, `place`, `rating`, `comment`, `last_modified`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now());");
        // for error reporting
        echo $mysqli->error;
        $stmt->bind_param("sssssissis", $fname, $lname, $phone, $email, $contact, $groupNum, $date, $place, $rating, $comment);
        $stmt->execute();
        $stmt->close();

        // redirect user to same page / reload page
        header('Location: comments.php'); 
    }
?>
            
    <div class="form">
        <!-- Visit Satisfaction Survery Form -->
        <form name="survey-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" onsubmit="return validate();">
            <h2>Please tell us about your visit to:</h2>
            <h1 class="center">Alexandria Bay</h1>
            <hr>
            
            <h3>Contact Information:</h3>
            
            <!-- Name -->
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" placeholder="First Name" required/>
            <br/>
            <label for="lname">Last Name:</label>
		    <input type="text" name="lname" id="lname"  placeholder="Last Name"/>
            <br/>
            
            <!-- Phone -->
            <label for="phone" style="margin-left: 17px">Phone #:</label>
		    <input type="tel" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="555-555-1234"/>
            <!-- Inline style for form validation -->
            <span id="phone*" style="display:none;">* Phone or email required to contact</span><br/>

            <!-- Email -->
            <label for="email" style="margin-left: 38px">Email:</label>
		    <input type="email" name="email" id="email" placeholder="yourEmail@gmail.com"/>
            <!-- Inline style for form validation -->
            <span id="email*" style="display:none;">* Phone or email required to contact</span><br/>

            <!-- Contact Permission -->
            <label for="contact">May we contact you about this survey?</label>
            <select name="contact" id="contact">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select> <br/>
            
            <hr>

            <!-- Number in Group -->
            <label for="groupNum">How many in your group?</label>
            <input id="groupNum" type="number" name="groupNum" value="1" min="1" max="20" required/>
            <br/>

            <!-- Date of Visit -->
            <label for="date">When did you visit?</label>
            <input id="date" type="date" name="date" required>
            <!-- Inline style for form validation -->
            <span id="date*" style="display:none;">* Date Cannot be in the Future</span><br/>

            <!-- Favorite Place -->
            <fieldset>
                <legend>Favorite Place</legend>
                <input id="castle" type="radio" name="place" value="castle"/>
                <label for="castle">Boldt Castle</label> <br/>
                <input id="uncleSam" type="radio" name="place" value="uncleSam"/>
                <label for="uncleSam">Uncle Sam Boat Tours</label> <br/>
                <input id="winery" type="radio" name="place" value="winery"/>
                <label for="winery">Thousand Islands Winery</label> <br/>
                <input id="driveIn" type="radio" name="place" value="driveIn"/>
                <label for="driveIn">Bay Drive-in Theatre</label> <br/>
                <input id="giftShops" type="radio" name="place" value="giftShops"/>
                <label for="giftShops">Gift Shops</label> <br/>
                <input id="riversEdge" type="radio" name="place" value="riversEdge"/>
                <label for="riversEdge">Riveredge Resort</label> <br/>
                <input id="edgewood" type="radio" name="place" value="edgewood"/>
                <label for="edgewood">Edgewood Resort</label> <br/>
            </fieldset>

            <!-- Overall Rating -->
            <label for="rating">Overall rate your visit to Alex Bay:</label> <br/>
            0<input id="rating" type="range" name="rating" min="0" max="10" step="1" list="level" />10
            <datalist id="level">
                <option value="0" label="0"></option>
                <option value="1" label="1"></option>
                <option value="2" label="2"></option>
                <option value="3" label="3"></option>
                <option value="4" label="4"></option>
                <option value="5" label="5"></option>
                <option value="6" label="6"></option>
                <option value="7" label="7"></option>
                <option value="8" label="8"></option>
                <option value="9" label="9"></option>
                <option value="10" label="10"></option>
            </datalist>
            <br/>
            
            <label for="comment">Additional Comments:</label> <br/>
            <textarea id="comment" name="comment" required></textarea>
            <br/>

            <button type="submit" id="submit" name="submit">Submit Feedback</button>
        </form>
        
        <hr>
        
    </div>

    <!-- Display all comments -->
    <h2>What Others Say About ABay:</h2>

    <ul>
    <?php
        // connect to the database
        include("../../../dbCon.php");
    
        // query to get existing comments from the database
        $query = "SELECT * FROM finalComments ORDER BY last_modified DESC LIMIT 10";
    
        // execute the query
        $result = $mysqli->query($query);
    
        // list all existing comments, most recent first (name bold, darkblue; last_modified gray)
        while($row = $result->fetch_assoc()) {
            echo "<li><b style='color:darkblue; font-size: 1.2em; padding-bottom: 10px;'>" . $row['fname'] ."</b>".": " . $row['comment'] . " @ " . "<span style='color:gray;'>" . $row['last_modified'] . "</span></li>";
        }
        // close db connection
        $mysqli->close();
    ?>
    </ul>

<?php
    include($path."assets/inc/footer.php");
?>
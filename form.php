<?php
include 'top.php';

$dataIsGood = false;
$message = '';

$first = '';
$last = '';
$email = '';

$chkBernie = false;
$chkBob = false;
$chkShakira = false;

$nounFirst = '';
$nounSecond = '';
$nounThird = '';
$adjectiveFirst = '';
$verbFirst = '';
$verbSecond = '';
$adjectiveSecond = '';

$building = "";

$verbS = 'none';


function getData($field) {
    if(!isset($_POST[$field])) {
        $data = "";
    }
    else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

?>

<main>
    <h1>Daily Madlib</h1>

    <section id = "form_intro">
        <h2>Break Time</h2>
        <p>Is it break time? Ready for some fun! Here's a daily madlib. Check your email for the result and laugh :D</p>
        <?php
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //sanitizing
                $first = getData('txtFirst');
                $last = getData('txtLast');
                $email = getData('txtEmail');

                $chkBernie = (int) getData('chkBernie');
                $chkBob = (int) getData('chkBob');
                $chkShakira = (int) getData('chkShakira');

                $nounFirst = getData('txtNounOne');
                $nounSecond = getData('txtNounTwo');
                $nounThird = getData('txtNounThree');
                $adjectiveFirst = getData('txtAdjectiveOne');
                $verbFirst = getData('txtVerbOne');
                $verbSecond = getData('txtVerbTwo');
                $adjectiveSecond = getData('txtAdjectiveTwo');

                $building = getData('radBuilding');

                $verbS = getData('lstVerbS');


                //validate form
                $dataIsGood = true;

                if($first == ''){
                    print '<p class="mistake">Please type in your first name.</p>';
                    $dataIsGood = false;
                }

                if($last == ''){
                    print '<p class="mistake">Please type in your last name.</p>';
                    $dataIsGood = false;
                }

                if($email == ''){
                    print '<p class="mistake">Please type in your email address.</p>';
                    $dataIsGood = false;
                }
                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    print '<p class="mistake">Your email address contains invalid characters</p>';
                    $dataIsGood = false;
                }

                $totalChecked = 0;

                if($chkBob != 1) $chkBob = 0;
                $totalChecked += $chkBob;

                if($chkJane != 1) $chkJane = 0;
                $totalChecked += $chkJane;

                if($chkBernie != 1)$chkBernie = 0;
                $totalChecked += $chkBernie;

                if($chkShakira != 1)$chkShakira = 0;
                $totalChecked += $chkShakira;

                if($totalChecked == 0){
                    print '<p class="mistake">Please choose at least one name.</p>';
                    $dataIsGood = false;
                }

                if($building != "house" AND $building != "mall" AND $building != "skyscraper" AND $building != "barn" AND $building != "restaurant"){
                    print '<p class="mistake"> Please choose a building.</p>';
                    $dataIsGood = false;
                }

                if($nounFirst == ""){
                    print '<p class="mistake">Please type in a noun (1).</p>';
                    $dataIsGood = false;
                }

                if($nounSecond == ""){
                    print '<p class="mistake">Please type in a noun (2).</p>';
                    $dataIsGood = false;
                }

                if($nounThird == ""){
                    print '<p class="mistake">Please enter a noun (3).</p>';
                    $dataIsGood = false;
                }

                if($adjectiveFirst == ""){
                    print '<p class="mistake">Please type in an adjective (1).</p>';
                    $dataIsGood = false;
                }

                if($verbFirst == ""){
                    print '<p class="mistake">Please type in a verb (1).</p>';
                    $dataIsGood = false;
                }

                if($verbSecond == ""){
                    print '<p class="mistake">Please type in a verb (2).</p>';
                    $dataIsGood = false;
                }

                if($adjectiveSecond == ""){
                    print '<p class="mistake">Please enter an adjective (2).</p>';
                    $dataIsGood = false;
                }
                
        
                if($verbS == "none"){
                    print '<p class="mistake">Please choose a verb.</p>';
                    $dataIsGood = false;
                }


                if($dataIsGood){
                    try{
                        $sql = 'INSERT INTO tblMadlib (fldFirstName, fldLastName, fldEmail, fldBernie, fldBob, fldShakira,
                            fldNoun, fldNounTwo, fldNounThree, fldAdjective, fldVerbOne, fldVerbTwo, fldAdjectiveTwo, fldBuilding, fldVerbThreeS)
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

                        $statement = $pdo->prepare($sql);
                        $data = array($first, $last, $email, $chkBernie, $chkBob, $chkShakira,
                        $nounFirst, $nounSecond, $nounThird, $adjectiveFirst, $verbFirst, $verbSecond, $adjectiveSecond, $building, $verbS);
                            

                        if($statement->execute($data)){
                            $message = '<h2>Thank You!</h2>';
                            $message .= '<p>Your madlib was successfully saved.</p>';
                                
                            $to = $email;

                            $from= 'The Study Corner <ffeeney@uvm.edu>';
                            $subject = 'Your Madlib Reveal';

                            $mailMessage = '<p style="font: 11pt Andale Mono;">Here is your completed madlib!<br>';
                            $mailMessage .= '<br>"Hey! This is your friend ' . $nounFirst . '-';
                            if($chkBernie == 1){$mailMessage .= "Bernie ";} if($chkBob == 1){$mailMessage .= "Bob ";} if($chkShakira == 1){$mailMessage .= "Shakira ";} 
                            $mailMessage .= ' from work. I am sending you a quick message because you forgot your ' . $nounSecond . ' at the '. $building . ' today, and I felt too ' . $adjectiveFirst . ' just leaving it there without telling you. I noticed it'; 
                            $mailMessage .= ' earlier today when you ' . $verbFirst . ', and I wanted to say that I could not stop ' . $verbSecond . ' when I saw. You are amazing!';
                            $mailMessage .= ' Anyway, I just wanted to let you know because that ' . $nounSecond . ' is super ' . $adjectiveSecond .'. I would not want you to forget it. You know about the ' . $nounThird . ' that ' . $verbS . ' the lost and found box every night.. I wonder when corporate is going to do something about that.."<br>';
                            $mailMessage .= '<br><strong>Thanks for using our site! Now, get back to studying!</strong><br>';
                            $mailMessage .='<strong>-Freyja and Tess</strong></p>';

                            $headers = "MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/html; charset=utf-8\r\n";
                            $headers .= "From: " . $from . "\r\n";

                            $mailSent = mail($to, $subject, $mailMessage, $headers);

                            if($mailSent) {
                                print "<p>Your results were sent to your email! Run!</p>";
                                print $mailMessage;
                            }
                        }
                        else{
                            $message = '<p>Record was NOT successfully saved.</p>';
                        }
                    }
                    catch(PDOException $e){
                        $message = '<p>Couldn\'t insert the record, please contact someone.</p>';
                    }
                }
            }
        ?>
    </section> 

    <section>
        <h2>Madlibs!</h2>
        <form action="#" id="Birthday" method="post">
            <fieldset class="textarea">
                <legend>Please enter some information about yourself</legend>
                <p>
                    <label for="txtFirst" class="required">First Name:</label>
                    <input id="txtFirst" maxlength="60" type="text" name="txtFirst" onfocus="this.select()" tabindex="300" value="<?php print $first; ?>" required>
                </p>
                <p>
                    <label for="txtLast" class="required">Last Name:</label>
                    <input id="txtLast" maxlength="60" type="text" name="txtLast" onfocus="this.select()" tabindex="300" value="<?php print $last; ?>" required>
                </p>
            </fieldset>

            <fieldset class="contact">
                <legend>Please enter your email</legend>
                <p>
                    <label for="txtEmail">Email:</label>
                    <input id="txtEmail" maxlength="60" name="txtEmail" onfocus="this.select()" type="email" value="<?php print $email; ?>" required>
                </p>
            </fieldset>

            <fieldset class="checkbox">
                <legend>Choose some names</legend>
                <p>
                    <input id="chkBob" name="chkBob" tabindex="510" type="checkbox" value="1"
                    <?php if($chkBob) print 'checked'; ?>>
                    <label for="chkBob">Bob</label>
                </p>
                <p>
                    <input id="chkBernie" name="chkBernie" tabindex="510" type="checkbox" value="1"
                    <?php if($chkBernie) print 'checked'; ?>>
                    <label for="chkBernie">Bernie</label>
                </p>
                <p>
                    <input id="chkShakira" name="chkShakira" tabindex="510" type="checkbox" value="1"
                    <?php if($chkShakira) print 'checked'; ?>>
                    <label for="chkShakira">Shakira</label>
                </p>
            </fieldset>

            <fieldset class="radio">
                <legend>Choose a building</legend>
                <p>
                    <input type="radio" id="radHouse" name="radBuilding" value="house" tabindex="410" required
                    <?php if($building == "house") print 'checked'; ?>>
                    <label class="radio-field" for="radHouse">House</label>
                </p>
                <p>
                    <input type="radio" id="radMall" name="radBuilding" value="mall" tabindex="410" required
                    <?php if($building == "mall") print 'checked'; ?>>
                    <label class="radio-field" for="radMall">Mall</label>
                </p>
                <p>
                    <input type="radio" id="radSky" name="radBuilding" value="sky" tabindex="410" required
                    <?php if($building == "sky") print 'checked'; ?>>
                    <label class="radio-field" for="radSky">Skyscraper</label>
                </p>
                <p>
                    <input type="radio" id="radBarn" name="radBuilding" value="barn" tabindex="410" required
                    <?php if($building == "barn") print 'checked'; ?>>
                    <label class="radio-field" for="radBarn">Barn</label>
                </p>
                <p>
                    <input type="radio" id="radRest" name="radBuilding" value="restaurant" tabindex="410" required
                    <?php if($building == "restaurant") print 'checked'; ?>>
                    <label class="radio-field" for="radRest">Restaurant</label>
                </p>
            </fieldset>


            <fieldset class="textarea">
                <legend>Type in a word! Be imaginative!</legend>
                <p>
                    <label id="txtNounOne">Noun</label>
                    <textarea name="txtNounOne" rows="1" cols="40"></textarea>
                </p>
                <p>
                    <label id="txtNounTwo">Noun</label>
                    <textarea name="txtNounTwo" rows="1" cols="40"></textarea>
                </p>
                <p>
                    <label id="txtNounThree">Noun</label>
                    <textarea name="txtNounThree" rows="1" cols="40"></textarea>
                </p>
                <p>
                    <label id="txtAdjectiveOne">Adjective</label>
                    <textarea name="txtAdjectiveOne" rows="1" cols="40"></textarea>
                </p>
                <p>
                    <label id="txtVerbOne">Past Tense Verb</label>
                    <textarea name="txtVerbOne" rows="1" cols="40"></textarea>
                </p>
                <p>
                    <label id="txtVerbTwo">Past Verb ending in ing</label>
                    <textarea name="txtVerbTwo" rows="1" cols="40"></textarea>
                </p>
                <p>
                    <label id="txtAdjectiveTwo">Adjective</label>
                    <textarea name="txtAdjectiveTwo" rows="1" cols="40"></textarea>
                </p>
            </fieldset>


            <fieldset class="click">
                <legend>Choose a verb that ends with an S</legend>
                <p>
                    <select id="verbS" name="lstVerbS" tabindex="120">
                        <option value ="none"<?php if($wantTo == "") echo "selected"?> label="none"></option>
                        <option value="addresses"<?php if($wantTo == "lstAddress") echo "selected" ?>>Addresses</option>
                        <option value="discusses with"<?php if($wantTo == "lstDiscuss") echo "selected" ?>>Discusses</option>
                        <option value="misses"<?php if($wantTo == "lstMiss") echo "selected" ?>>Misses</option>
                        <option value="runs over"<?php if($wantTo == "lstRuns") echo "selected" ?>>Runs Over</option>
                        <option value="sleeps on"<?php if($wantTo == "lstSleeps") echo "selected" ?>>Sleeps</option>
                        <option value="reads to"<?php if($wantTo == "lstReads") echo "selected" ?>>Reads</option>
                        <option value="shakes"<?php if($wantTo == "lstShakes") echo "selected" ?>>Shakes</option>
                    </select>
                </p>
            </fieldset>

            <fieldset class="buttons">
                <input id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Submit">
            </fieldset>
            
        </form>
        }
        
    </section> 
</main>
<?php include 'footer.php'; ?>
</body>
</html>
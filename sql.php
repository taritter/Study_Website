<?php
include 'top.php';
?>

<main>
    <p>Create Table SQL</p>
    <pre>
        CREATE TABLE tblMadlib(
            pmkMadlibId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldFirstName VARCHAR(30) DEFAULT NULL,
            fldLastName VARCHAR(30) DEFAULT NULL,
            fldEmail VARCHAR(50) DEFAULT NULL,
    		fldBernie TINYINT(1) DEFAULT 0, 
    		fldBob TINYINT(1) DEFAULT 0, 
    		fldShakira TINYINT(1) DEFAULT 0,
            fldNoun TEXT, 
    		fldNounTwo TEXT, 
    		fldAdjective TEXT, 
    		fldVerbOne TEXT, 
    		fldVerbTwo TEXT, 
    		fldAdjectiveTwo TEXT, 
    		fldNounThree TEXT,
    		fldBuilding VARCHAR(40) DEFAULT NULL, 
    		fldVerbThreeS VARCHAR(15) DEFAULT NULL)
    </pre>

    <h2>Insert Data</h2>
    <pre>
        INSERT INTO tblMadlib (pmkMadlibId, fldFirstName, fldLastName, fldEmail, 
        fldBernie, fldBob, fldShakira, fldNoun, fldNounTwo, fldAdjective, fldVerbOne, 
        fldVerbTwo, fldAdjectiveTwo, fldNounThree, fldBuilding, fldVerbThreeS) 
        VALUES (1, 'Tess', 'Ritter', 'taritter@uvm.edu', 0, 0, 1, "bus", "strawberry", "soft", "swim", 
        "hop", "curly", "lipstick", 'restaurant', 'miss')
    </pre>

    <h2>Select records</h2>
    <pre>
        SELECT fldCountry, fldExperiences, fldPlaces, fldFood FROM tblTourism
    </pre>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
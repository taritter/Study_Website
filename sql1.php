<?php
include 'top.php';
?>

<main>
    <p>Create Table SQL</p>
    <pre>
        CREATE TABLE tblStudy(
            pmkStudyId INT AUTO_INCREMENT PRIMARY KEY,
            fldPomo VARCHAR(5) DEFAULT NULL,
            fldSQR VARCHAR(5) DEFAULT NULL,
            fldProcrastinate VARCHAR(5) DEFAULT NULL,
    		fldRetrival VARCHAR(5) DEFAULT NULL, 
    		fldSpaced VARCHAR(5) DEFAULT NULL, 
    		fldMindmap VARCHAR(5) DEFAULT NULL,
            fldMajor VARCHAR(15) DEFAULT NULL, 
    		flduniversity VARCHAR(30) DEFAULT NULL)
    </pre>

    <h2>Insert Data</h2>
    <pre>
    INSERT INTO tblStudy
        (fldPomo, fldSQR, fldProcrastinate, fldRetrival, fldSpaced, fldMindmap, fldMajor, flduniversity) 
        VALUES ('0', '1', '1', '0', '0', '0', 'neuroscience', 'Northeastern University'),
        ('1', '0', '0', '1', '0', '1', 'computer science', 'University of Vermont'),
        ('0', '0', '1', '0', '1', '0', 'psychology', 'University of Vermont'),
        ('0', '0', '1', '0', '0', '0', 'art', 'Syracuse'),
        ('1', '1', '1', '1', '0', '0', 'psychology', 'University of Vermont')
    </pre>

    <h2>Select records</h2>
    <pre>
        SELECT fldCountry, fldExperiences, fldPlaces, fldFood FROM tblTourism
    </pre>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
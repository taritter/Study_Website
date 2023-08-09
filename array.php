<?php
include 'top.php';
?>
<main>
    <section id = "experiences">
        <h2>Our friend's favorite study method</h2>
        <p>We collected data from thirty of our friends to determine which study method is most popular among college students.
            We have data from all types of students ranging from art students to pre-med students. Due to the size of the sample, 
            we only put in five rows. These five student's don't accurately represent our sample size, however, they show what our data looks like.
            From our data we found that most people prefer the pomodoro method like us, however, many end up procrastinating. In the table below
            there are numbers 1 or 0 for each study method. 1 means have done it and 0 means have never done it. We chose these study methods based on 
            the most popular choices from each person. In the future we hope to also look at majors and study methods. We also hope to expand on more statistics,
            almost making the part of the website and inforgraphic. We are also thinking of making a survey to get user data instead of 
            our friends. We want to know how you guys study best!
        </p>
    </section>
    <section id = "tbl">
        <h2>Our data</h2>
        <table>
            <tr>
                <th>Pomodoro Method</th>
                <th>SQR Method</th>
                <th>Procrastinate</th>
                <th>Retrival</th>
                <th>Spaced out method</th>
                <th>Mindmap</th>
                <th>Major</th>
                <th>University</th>
            </tr>

            <?php
            $sql1 = 'SELECT fldPomo, fldSQR, fldProcrastinate, fldRetrival, fldSpaced, fldMindmap, fldMajor, flduniversity FROM tblStudy';

            $statement = $pdo->prepare($sql1);
            $statement->execute();

            $studies = $statement->fetchAll();
                foreach( $studies as $study){
                    print '<tr>';
                    print '<td>' . $study['fldPomo'] . '</td>';
                    print '<td>' . $study['fldSQR'] . '</td>';
                    print '<td>' . $study['fldProcrastinate'] . '</td>';
                    print '<td>' . $study['fldRetrival'] . '</td>';
                    print '<td>' . $study['fldSpaced'] . '</td>';
                    print '<td>' . $study['fldMindmap'] . '</td>';
                    print '<td>' . $study['fldMajor'] . '</td>';
                    print '<td>' . $study['fldUniversity'] . '</td>';
                    print '</tr>' . PHP_EOL;
                }
                ?>
                <tr>
                    <td>Sources</td>
                    <td colspan="7">Our Friends</td>
                </tr>
        </table>
    </section>
    <section id = "info">
        <h2>Data explained</h2>
        <p>
            Some of these study methods are not mentioned in our website, so if any confusion they will be explained here. Procrastinate is not 
            really a study method, however, many people wrote it down as their go to 'technique'. Procrastination is pushing back an assignment or studying
            till the last second. It is common for college students because most of them are swamped with other work. Once you're behind in a class it's almost
            impossible to catch up. This also depends on the class. Spaced stands for spaced practice. This study method is studying
            over a long period of time. The opposite of procrastination. It's typically a two week long schedule that you follow. This method
            has been proven to be great for memorization and results in great grades! Lastly, mindmap is the result of drawing things out and making almost
            a drawing of it. This is used by creative thinkers and is great if you don't know what topics to study or create a storyline.
        </p>
    </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
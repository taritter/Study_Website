<nav class = "a">
    <ul>
        <li><a class = "<?php if($pathParts['filename'] == "index"){
            print 'activePage';
        } 
        ?>" href="index.php">Study Corner</a></li>

        <li><a class = "<?php if($pathParts['filename'] == "array"){
            print 'activePage';
        } 
        ?>" href="detail.php">Study Tips</a></li>

        <li><a class = "<?php if($pathParts['filename'] == "detail"){
            print 'activePage';
        } 
        ?>" href="form.php">Study Break</a></li>

        <li><a class = "<?php if($pathParts['filename'] == "form"){
            print 'activePage';
        } 
        ?>" href="array.php">You Guys</a></li>
    </ul>
</nav>
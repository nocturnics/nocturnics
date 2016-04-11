<?php
class A {

function display () {
try {
	$dbh = new pdo("mysql:host=localhost;dbname=nocs", "dbname", "pass");
	    }
catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
	exit;
}


    // Find out how many items are in the table
    $total = $dbh->query('SELECT COUNT(*) FROM php_blog')->fetchColumn();

    // How many items to list per page
    $limit = 5;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

   

    // Prepare the paged query
    $stmt = $dbh->prepare('SELECT *, LEFT(entry,200) FROM php_blog ORDER BY timestamp DESC LIMIT :limit OFFSET :offset');
    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    
	

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

        // Display the results
        foreach ($iterator as $row) {
	$id = ($row['id']);
    $date = date("l F d Y", $row['timestamp']);
    $title = stripslashes($row['title']);
    $entry = stripslashes($row['LEFT(entry,200)']);			
	$img = ('pics/'.$row['img_path'].'');	
	$ga= htmlspecialchars(strip_tags("gal?dir="));
	$al= $ga.$row['album'];	
	$alias = ($row['alias']);
              echo
			  '<h3>', $title, '</h3>',
			  
  '<a id="',$row['vari'],'" href="',$al,'"><img class="rnd" src="',$img,'"/></a>',
  '<p>', $entry, '</p>',
   '<p>','Posted on ', $date, '</p>';
    
        
		 if (mb_strlen($title) >= 20) {
        $title = substr($title, 0, 20);
        $title = $title . "...";
    }

		print("<a class='about' href=\"single.php?id=" . $id . "\">" . $date . " -- " . $title . "</a>");}
		 // Display the paging information
    echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

    } else {
        echo '<p>No results could be displayed.</p>';


//$stmt  = null;
}
}
}
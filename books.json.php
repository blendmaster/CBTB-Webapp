<?php 
require 'includes/db.inc.php';

if( $dbh = open_db() ) {
    echo json_encode(array('aaData' => $dbh->query("SELECT books.title, books.author, books.price, donations.donor, donations.location FROM `books` left join donations on books.donation_id = donations.id")->fetchAll(PDO::FETCH_NUM)));
}
    
?>

<?php
/**
 * Template Name: Evaldas Plugin Template
 *
 * @package WordPress
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;
$table_name = $wpdb->prefix . 'evaldas_users';

?>

<h3>Evaldas Customers Data </h3>

<table border="1" style="margin-top: 2rem;">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>LASTNAME</th>
        <th>DATE OF BIRTH</th>
        <th>ADDRESS</th>
    </tr>

    <?php


    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_rows = $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $total_pages = ceil($total_rows / $no_of_records_per_page);




    $results = $wpdb->get_results( "SELECT * FROM $table_name LIMIT $offset, $no_of_records_per_page");
    foreach ( $results as $person )   { ?>
        <tr>
            <td>  <?php echo $person->id; ?> </td>
            <td><?php echo $person->name; ?> </td>
            <td> <?php echo $person->lastname ; ?> </td>
            <td> <?php echo date('Y-m-d', strtotime($person->birthdate)) ?> </td>
            <td><?php echo $person->address; ?> </td>
        </tr>
    <?php }
    ?>

</table>


   <a href="?pageno=1">First</a></li>
   <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
   <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
   <a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>

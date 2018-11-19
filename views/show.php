<?php

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

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM wp_evaldas_users");
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

    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>

</table>
HOME
<form action="">
        <select name="" id="">
            <option value="">Select a brand</option>
            
<?php
if($brands) {
    foreach($brands as $brand) {
        echo "<option value=" .  $brand['ID'] . ">" . $brand['brandName'] . "</option>";
    }
} else {
    echo 'No brands found';
}
?>
        </select>
    </form>


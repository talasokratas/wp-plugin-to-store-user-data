<php?


?>
<style>

    label {
        margin-top: 2rem;
    }

</style>

<form id="evaldas-form" action="action_page.php">
    <div class="container">
        <h1>Input person's data</h1>
        <hr>

        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" id="name" name="name" required>

        <label for="lastname"><b>Lastname</b></label>
        <input type="text" placeholder="Enter Lastname" id="lastname" name="lastname" required>

        <label for="birthdate"><b>Date Of Birth</b></label>
        <input type="date" placeholder="Enter Date Of Birth" id="birthdate" name="birthdate" required>

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" id="address" name="address" required>

        <br>
        <button type="submit" class="registerbtn">Save</button>
    </div>
</form>
<?php
class form {
    public function displayForm() {
        echo '
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br><br>

            <input type="submit" name="submit" value="Register">
        </form>
        ';
    }
}
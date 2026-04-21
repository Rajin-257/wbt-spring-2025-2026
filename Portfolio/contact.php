<?php
    $name = $email = $message = "";
    $nameError = $emailError = $messageError = "";

    function cleanInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameError = "Name is required";
        } else {
            $name = cleanInput($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameError = "Only letters and spaces allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailError = "Email is required";
        } else {
            $email = cleanInput($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
            }
        }

        if (empty($_POST["message"])) {
            $messageError = "Message is required";
        } else {
            $message = cleanInput($_POST["message"]);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav>
    <li><a href="index.html">Home</a></li>
    <li><a href="educations.html">Education</a></li>
    <li><a href="experience.html">Experience</a></li>
    <li><a href="projects.html">Projects</a></li>
</nav>

<section class="contact">
    <div>
        <h1>Contact Me</h1>
        <p>Email: <a href="mailto:mrajin353@gmail.com">mrajin353@gmail.com</a></p>
        <p>Phone: 01615928286</p>
    </div>

    <div>
        <h1>Contact Form</h1>

        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?= $name ?>">
            <span class="error" style="color:red"><?= $nameError ?></span>


            <label>Email:</label>
            <input type="email" name="email" value="<?= $email ?>">
            <span class="error" style = "color:red"><?= $emailError ?></span>


            <label>Message:</label>
            <textarea name="message" rows="4"><?= $message ?></textarea>
            <span class="error" style="color:red"><?= $messageError ?></span>

            <input type="submit" value="Submit">
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"]=="POST" && !$nameError && !$emailError && !$messageError): ?>
            <h3>Submitted Values</h3> 
            <table class="result-table">
                <th>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Message</td>
                </th>
                <tr>
                    <td><?= $name ?></td>
                    <td><?= $email ?></td>
                    <td><?= $message?></td>
                </tr>

            </table>
        <?php endif; ?>
    </div>
</section>

</body>
</html>
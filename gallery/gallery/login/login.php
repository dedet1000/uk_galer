<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        input {
            width: calc(100% - 20px);
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #007bff;
        }
        .fon, .fon a{
            font-family: 'Arial', sans-serif;
            color: #343a40;
            font-weight: 600;
        }
        .fon-t a{
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5.5px 6px;
            margin-top: -7px;
            display: block;
        }
        .fon-t a:hover {
            color: #ffffff;
            background-color: #007bff;
        }
        
    </style>
</head>
<body>
    <form action="proses_login.php" method="post">
        <h1>Login</h1>
        <table>
            <tr>
                <td class="fon">Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td class="fon">Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td class="fon-t"><a href="../register/register.php">Register</a></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>

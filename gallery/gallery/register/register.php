<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
            width: 400px;
            max-width: 100%;
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
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
            background-color: #0056b3;
        }
        .login a{
            border: #007bff solid 1px;
            padding: 6.3px 10px;
            color: #007bff;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: -9px;
            border-radius: 4px;
        }
        .login a:hover {
            color: #ffffff;
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <form action="proses_register.php" method="post">
        <h1>Halaman Registrasi</h1>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="namalengkap" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td class="login"><a href="../login/login.php">Login</a></td>
                <td colspan="2"><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>

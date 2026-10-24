<?php

require_once "conn.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "select * from customers where customerId = $id";
$result = mysqli_query($connect , $query);
$customers = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >
    <style>
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem 1rem;
            color: #26332f;
            background:
                radial-gradient(ellipse at top right, rgba(226, 166, 91, 0.2), transparent 32rem),
                #f3f6f2;
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        .customer-form-card {
            width: min(100%, 780px);
            overflow: hidden;
            border: 1px solid #e0e8df;
            border-radius: 1.25rem;
            background: #fff;
            box-shadow: 0 1.25rem 3.5rem rgba(41, 65, 54, 0.12);
        }

        .customer-form-header {
            position: relative;
            overflow: hidden;
            padding: clamp(1.6rem, 4vw, 2.5rem);
            color: #fff;
            background: #176b59;
        }

        .customer-form-header::after {
            position: absolute;
            top: -3.5rem;
            right: -1.5rem;
            width: 12rem;
            height: 12rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 50%;
            box-shadow: 0 0 0 1.5rem rgba(255, 255, 255, 0.06),
                        0 0 0 3rem rgba(255, 255, 255, 0.04);
            content: "";
        }

        .customer-form-header h1 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-size: clamp(1.55rem, 4vw, 2.1rem);
            font-weight: 700;
            letter-spacing: -0.03em;
        }

        .customer-form-header p {
            position: relative;
            z-index: 1;
            margin: 0.55rem 0 0;
            color: #d6eee7;
        }

        .customer-form-body {
            padding: clamp(1.5rem, 4vw, 2.5rem);
        }

        .customer-form-body .form-label {
            margin-bottom: 0.45rem;
            color: #394a43;
            font-size: 0.9rem;
            font-weight: 650;
        }

        .customer-form-body .form-control {
            min-height: 49px;
            border: 1px solid #d9e3dc;
            border-radius: 0.7rem;
            background-color: #fbfcfa;
        }

        .customer-form-body .form-control:focus {
            border-color: #4b9b83;
            background-color: #fff;
            box-shadow: 0 0 0 0.22rem rgba(23, 107, 89, 0.13);
        }

        .customer-form-submit {
            min-height: 50px;
            border: 0;
            border-radius: 0.7rem;
            background: #176b59;
            font-weight: 650;
            transition: background-color 150ms ease, transform 150ms ease;
        }

        .customer-form-submit:hover {
            transform: translateY(-1px);
            background: #115544;
        }
    </style>
</head>
<body>
    
    <main class="customer-form-card">
        <header class="customer-form-header">
            <h1>Update a customer</h1>
            <p>Edit the customer information and save your changes.</p>
        </header>
        <form class="customer-form-body" action="handle/handleUpdate.php?id=<?= $customers["customerId"] ?>" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="firstName">First name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="e.g. Alex" value="<?= $customers["firstName"] ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="lastName">Last name</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" placeholder="e.g. Morgan" value="<?= $customers["lastName"] ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="alex@example.com" value="<?= $customers["email"] ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="gender">Gender</label>
                    <input class="form-control" type="text" id="gender" name="gender" placeholder="Enter gender" value="<?= $customers["gender"] ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <input class="form-control" type="text" id="country" name="country" placeholder="Enter country" value="<?= $customers["country"] ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="city">City</label>
                    <input class="form-control" type="text" id="city" name="city" placeholder="Enter city" value="<?= $customers["city"] ?>">
                </div>
                <div class="col-12 pt-2">
                    <button class="btn btn-primary customer-form-submit w-100" type="submit" name="submitUpdate">Update customer</button>
                </div>
            </div>
        </form>
    </main>


</body>
</html>
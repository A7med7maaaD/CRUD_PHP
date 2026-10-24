
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Customer</title>
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
            color: #182230;
            background:
                radial-gradient(ellipse at top left, rgba(80, 115, 255, 0.14), transparent 35rem),
                #f4f7fb;
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        .customer-form-card {
            width: min(100%, 760px);
            overflow: hidden;
            border: 1px solid #e5eaf2;
            border-radius: 1rem;
            background: #fff;
            box-shadow: 0 1rem 3rem rgba(27, 43, 71, 0.1);
        }

        .customer-form-header {
            padding: clamp(1.5rem, 4vw, 2.25rem);
            border-bottom: 1px solid #e9edf4;
        }

        .customer-form-header h1 {
            margin: 0;
            color: #172554;
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 700;
            letter-spacing: -0.03em;
        }

        .customer-form-header p {
            margin: 0.5rem 0 0;
            color: #667085;
        }

        .customer-form-body {
            padding: clamp(1.5rem, 4vw, 2.25rem);
        }

        .customer-form-body .form-label {
            margin-bottom: 0.45rem;
            color: #344054;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .customer-form-body .form-control {
            min-height: 48px;
            border-color: #d8deea;
            border-radius: 0.65rem;
        }

        .customer-form-body .form-control:focus {
            border-color: #7188f5;
            box-shadow: 0 0 0 0.22rem rgba(80, 115, 255, 0.14);
        }

        .customer-form-submit {
            min-height: 48px;
            padding: 0.7rem 1.25rem;
            border: 0;
            border-radius: 0.65rem;
            background: #4257d6;
            font-weight: 600;
        }

        .customer-form-submit:hover {
            background: #3448c2;
        }
    </style>
</head>
<body>
    <main class="customer-form-card">
        <header class="customer-form-header">
            <h1>Add a customer</h1>
            <p>Enter the customer details below.</p>
        </header>
        <form class="customer-form-body" action="handle/handleInsert.php" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="firstName">First name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="e.g. Alex">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="lastName">Last name</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" placeholder="e.g. Morgan">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="alex@example.com">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="gender">Gender</label>
                    <input class="form-control" type="text" id="gender" name="gender" placeholder="Enter gender">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <input class="form-control" type="text" id="country" name="country" placeholder="Enter country">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="city">City</label>
                    <input class="form-control" type="text" id="city" name="city" placeholder="Enter city">
                </div>
                <div class="col-12 pt-2">
                    <button class="btn btn-primary customer-form-submit w-100" type="submit" name="submitInsert">Add customer</button>
                </div>
            </div>
        </form>
    </main>
    
</body>
</html>
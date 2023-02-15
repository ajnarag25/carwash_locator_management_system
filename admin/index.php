<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/loder.png" rel="icon">
    <title>Login Administrator</title>
    <link rel="stylesheet" href="dist/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="container-fluid ps-md-0">
            <div class="row g-0">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                    <div class="col-md-8 col-lg-6">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8 mx-auto">
                                        <h3 class="login-heading mb-4">Login Administrator</h3>

                                    <form action="functions.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput">Email <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="email"  placeholder="Enter Email" required>

                                        <div class="form-floating mb-3">
                                            <label for="floatingPassword">Password <span style="color:red">*</span></label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                        </div>

                                        <div class="d-grid">
                                            <a href="../index.php" class="btn btn-lg btn-secondary btn-login" style="color:white">Back</a>
                                            <button class="btn btn-lg btn-primary btn-login" name="login_admin" type="submit">Login</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
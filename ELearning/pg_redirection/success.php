<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SSLCommerz">
    <title>Successful Transaction - SSLCommerz</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #28a745;
            font-weight: 700;
            text-align: center;
        }

        .text-danger {
            color: #dc3545;
            font-weight: 700;
            text-align: center;
        }

        .table {
            margin-top: 30px;
        }

        .btn-back {
            margin-top: 30px;
            text-align: center;
        }

        .btn-back a {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php
                require_once(__DIR__ . "/../ssl/lib/SslCommerzNotification.php");
                include_once(__DIR__ . "/../db_connection.php");
                include_once(__DIR__ . "/../OrderTransaction.php");

                use SslCommerz\SslCommerzNotification;

                $sslc = new SslCommerzNotification();
                $tran_id = $_POST['tran_id'];
                $amount = $_POST['amount'];
                $currency = $_POST['currency'];

                $ot = new OrderTransaction();
                $sql = $ot->getRecordQuery($tran_id);
                $result = $conn_integration->query($sql);

                if ($result) {
                    $row = $result->fetch_assoc();

                    if ($row && ($row['status'] == 'Pending' || $row['status'] == 'Processing')) {
                        $validation = $sslc->orderValidate($_POST, $tran_id, $amount, $currency);

                        if ($validation == TRUE) {
                            $sql = $ot->updateTransactionQuery($tran_id, 'Processing');

                            if ($conn_integration->query($sql) === TRUE) { ?>
                                <h2>Congratulations! Your Transaction is Successful.</h2>
                                <p>An email has been sent to you shortly for confirmation along with the invoice and access to the Learning Management System.</p>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="2">Payment Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-right">Transaction ID</td>
                                            <td><?= htmlspecialchars($_POST['tran_id']) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Transaction Time</td>
                                            <td><?= htmlspecialchars($_POST['tran_date']) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Payment Method</td>
                                            <td><?= htmlspecialchars($_POST['card_issuer']) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Bank Transaction ID</td>
                                            <td><?= htmlspecialchars($_POST['bank_tran_id']) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Amount</td>
                                            <td><?= htmlspecialchars($_POST['amount']) . ' ' . htmlspecialchars($_POST['currency']) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="text-danger">Error updating record: <?= htmlspecialchars($conn_integration->error) ?></div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="text-danger">Payment validation failed. Please contact the merchant.</div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="text-danger">Invalid transaction information or transaction already processed.</div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="text-danger">Error fetching transaction record: <?= htmlspecialchars($conn_integration->error) ?></div>
                <?php } ?>
                <div class="btn-back">
                    <a href="index.php">Go Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    session_start();
    include '../connection.php';
    include '../components/header.php';
    ?>
<style>
    body {
        background-color: black;
    }

    .center {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 80vh;
    }

    .buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
    }

    .buttons button:not(:last-child) {
        margin-right: 1rem;
    }

    .refNumber {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    .img {
        width: 300px;
    }
</style>

<div class="center">
    <img src="../assets/images/gcash.jpeg" alt="" class="img">
</div>

<form action="../CRUD/delivery.php" method="get">

    <div class="form-group refNumber">
        <input type="text" name="full_name" placeholder="Full Name" required>
    </div>

    <div class="form-group refNumber">
        <input type="number" name="contact_no" placeholder="Contact Number" required>
    </div>

    <div class="p-1 buttons">
        <button type="submit" name="delivery_type_pickup" class="btn btn-success" data-toggle="modal" data-target="#successModal">Pick Up</button>
        <button type="submit" name="delivery_type_cash_delivery" class="btn btn-primary" data-toggle="modal" data-target="#successModal">Cash Delivery</button>
        <a href="./cart.php" class="btn btn-danger">Back</a>
    </div>
</form>
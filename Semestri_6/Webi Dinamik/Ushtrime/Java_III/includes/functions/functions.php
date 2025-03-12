<?php

function search(string $username): string
{
    $file = fopen('db.txt', 'r');
    if (!$file) {
        return '';
    }

    while (($line = fgets($file)) !== false) {
        $line = trim($line);
        if ($line === '') {
            continue;
        }

        [$name, $userDB, $passDB] = explode(',', $line);

        if ($username === $userDB) {
            fclose($file);
            return $passDB;
        }
    }

    fclose($file);
    return '';
}

function login(string $username, string $password): void
{
    if (empty($username) || empty($password)) {
        echo "<p style='color: red;'>All fields must be filled!</p>";
        return;
    }

    $passDB = search($username);
    if ($passDB === '') {
        echo "<p style='color: red;'>This user does not exist!</p>";
        return;
    }

    if ($password === $passDB) {
        header('Location: home.php');
        exit;
    } else {
        echo "<p style='color: red;'>Incorrect password!</p>";
    }
}

function register(?string $name, ?string $username, ?string $password, ?string $confirmPassword): void
{
    if (empty($name) || empty($username) || empty($password) || empty($confirmPassword)) {
        echo "<p style='color: red;'>All fields must be filled!</p>";
        return;
    }

    if ($password !== $confirmPassword) {
        echo "<p style='color: red;'>Passwords do not match!</p>";
        return;
    }

    if (search($username) !== '') {
        echo "<p style='color: red;'>This user already exists!</p>";
        return;
    }

    $line = sprintf("%s,%s,%s\n", $name, $username, $password);
    $file = fopen('db.txt', 'a');
    if ($file) {
        fwrite($file, $line);
        fclose($file);
        header('Location: login.php');
        exit;
    } else {
        echo "<p style='color: red;'>Failed to register user!</p>";
    }
}